<?php

namespace App\Services;

use App\Enums\PostStatus;
use App\Http\Controllers\ContentTypes\ImageHandler;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Repository\Elasticsearch;
use App\Repository\PostRepository;
use App\Repository\PushNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class PostService
{
    private $postRepository;
    private $elasticsearch;
    public function __construct(PostRepository $postRepository, Elasticsearch $elasticsearch)
    {
        $this->postRepository = $postRepository;
        $this->elasticsearch = $elasticsearch;
    }

    public function store($request)
    {
        if ($request->status == (PostStatus::SCHEDULE)->value) {
            $published_at = $request->published_at;
        } else if ($request->status == (PostStatus::PUBLISH)->value || $request->status == (PostStatus::ARCHIVE)->value) {
            $published_at = now();
        } else {
            $published_at = null;
        }

        $post = null;

        DB::beginTransaction();

        try {

            if ($request->hasFile('image')) {

                $options = [
                    "resize" => [
                        "width" => "1024",
                        "height" => "null"
                    ],
                    "quality" => "70%",
                    "upsize" => true,
                    "thumbnails" => [
                        [
                            "name" => "medium",
                            "scale" => "50%"
                        ],
                        [
                            "name" => "small",
                            "scale" => "25%"
                        ],
                        [
                            "name" => "cropped",
                            "crop" => [
                                "width" => "300",
                                "height" => "250"
                            ]
                        ]
                    ]
                ];
                $options = json_decode(json_encode($options));

                $path = (new ImageHandler($request, 'posts', 'image', $options))->handle();
                // $post->image()->create(['path' => $path, 'caption' => $request->caption]);
            } else {
                $path = $request->image;
            }

            $post = $this->postRepository->store($request, $published_at, $path);

            activity()
                ->performedOn($post)
                ->event('store')
                ->withProperties(['data' => $post->with(['tags', 'image'])])
                ->log('store post');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        if (!$post) {
            return;
            // die;
        }

        if ($request->status == (PostStatus::PUBLISH)->value || $request->status == (PostStatus::ARCHIVE)->value) {
            $params = [
                'index' => 'article',
                'id'    => $post->id,
                'body'  => json_decode((new PostResource($post))->toJson(), true)
            ];
            $es = $this->elasticsearch->create($params);
        }

        if ($request->status == (PostStatus::PUBLISH)->value) {
            $push = new PushNotification();
            $push->sendNotification($post->id, "Berita Terbaru", $post->title, env('STORAGE') . '/' . $post->image->thumbnail('medium', 'path'), env('WEBSITE_URL') . '/' . $post->url, "web");
        }


        return $post;
    }

    public function update($request, Post $post)
    {
        $current = $post;

        try {
            $doc = $this->elasticsearch->get([
                'index' => 'article',
                'id'    => $post->id,
                'type'  => '_doc'
            ]);
        } catch (\Throwable $th) {
            $doc  = json_decode($th->getMessage(), true);
        }

        if ($post->status == PostStatus::DRAFT && $request->status == (PostStatus::PUBLISH)->value && $post->published_at == null) {
            $published_at = Carbon::now();
        } else if ($request->status == (PostStatus::ARCHIVE)->value && $post->published_at == null) {
            $published_at = Carbon::now();
        } else {
            $published_at = $post->published_at;
        }

        DB::beginTransaction();
        try {
            if ($request->hasFile('image')) {

                $options = [
                    "resize" => [
                        "width" => "1024",
                        "height" => "null"
                    ],
                    "quality" => "70%",
                    "upsize" => true,
                    "thumbnails" => [
                        [
                            "name" => "medium",
                            "scale" => "50%"
                        ],
                        [
                            "name" => "small",
                            "scale" => "25%"
                        ],
                        [
                            "name" => "cropped",
                            "crop" => [
                                "width" => "300",
                                "height" => "250"
                            ]
                        ]
                    ]
                ];
                $options = json_decode(json_encode($options));

                $path = (new ImageHandler($request, 'posts', 'image', $options))->handle();
            }

            if ($request->image) {
                $path = $request->image;
            }

            $post = $this->postRepository->update($request, $post, $published_at, $path);

            if (!$doc['found'] && $post->status == PostStatus::PUBLISH || $post->status == PostStatus::ARCHIVE) {
                $params = [
                    'index' => 'article',
                    'id'    => $post->id,
                    'body'  => json_decode((new PostResource($post))->toJson(), true)
                ];
                $es = $this->elasticsearch->create($params);
            }

            if ($doc['found'] && $post->status == PostStatus::DRAFT) {
                $params = [
                    'index' => 'article',
                    'id'    => $post->id,
                ];
                $es = $this->elasticsearch->delete($params);
            }


            if ($current->status == PostStatus::DRAFT && $request->status == (PostStatus::PUBLISH)->value) {

                $push = new PushNotification();
                $push->sendNotification($post->id, "Berita Terbaru", $post->title, env('STORAGE') . '/' . $post->image->thumbnail('medium', 'path'), env('WEBSITE_URL') . '/' . $post->url, "web");
            }

            activity()
                ->performedOn($post)
                ->event('update')
                ->withProperties(['data' => $post->with(['tags', 'image'])])
                ->log('update post');

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }
    }
}
