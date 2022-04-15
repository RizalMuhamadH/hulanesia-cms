<?php

namespace App\Http\Controllers;

use App\Enums\PostStatus;
use App\Http\Controllers\ContentTypes\ImageHandler;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Feature;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Facades\LogBatch;
use Spatie\Activitylog\Models\Activity;
use App\Http\Resources\PostResource;
use App\Helpers\Meilisearch;
use App\Http\Resources\PostListResource;
use App\Jobs\PostSchedule;
use App\Models\Netizen;
use App\Repository\Elasticsearch;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    private $repository;

    public function __construct(Elasticsearch $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $layout = $request->layout ?? 'app';
        return view('post.index', [
            'layout' => $layout
        ]);
    }

    public function add()
    {


        $action = 'Add';
        $categories = Category::with('children')->where('parent_id', 0)->get();
        $features = Feature::get();
        $users = Netizen::get();

        return view('post.edit-add', [
            'action' => $action,
            'categories' => $categories,
            'features' => $features,
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        // dd(now()->diffInMinutes($request->published_at));
        // dd(now()->addMinutes($request->published_at)->minute);

        if ($request->status == 'SCHEDULE') {
            $published_at = $request->published_at;
        } else if ($request->status == 'PUBLISH') {
            $published_at = now();
        } else {
            $published_at = null;
        }

        DB::transaction(function () use ($request, $published_at) {
            
            $post = Post::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title, "-"),
                'description' => $request->description,
                'body' => $request->body,
                'source' => $request->source,
                'source_link' => $request->source_link,
                'feature_id' => $request->feature_id,
                'category_id' => $request->category_id,
                'status' => $request->status,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
                'seo_title' => $request->seo_title,
                'published_at' => $published_at,
                'admin_id' => Auth::user()->id,
                'author_id' => $request->author_id
            ]);
    
    
            $post->tags()->attach($request->tags);
            $post->related()->attach($request->related);
    
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
                $post->image()->create(['path' => $path, 'caption' => $request->caption]);
            }
    
            // Meilisearch::get()->index('post')->addDocuments([
            //     json_decode((new PostResource($post))->toJson(), true)
            // ]);
    
            $params = [
                'index' => 'article',
                'id'    => $post->id,
                'body'  => json_decode((new PostResource($post))->toJson(), true)
            ];
            $es = $this->repository->create($params);
    
            if ($request->status == 'SCHEDULE') {
                PostSchedule::dispatchSync(new PostSchedule($post, $this->repository))->delay(now()->addMinutes(now()->diffInMinutes($request->published_at)));
            }
    
            // PostSchedule::dispatch($post, $this->repository);
    
            activity()
                ->performedOn(new Post())
                ->event('store')
                ->withProperties(['data' => $post->with(['tags', 'image'])])
                ->log('store post');
        });


        return redirect()->route('post.index')->with('message', 'Add Successfully');
    }

    public function edit($id)
    {

        $post = Post::findOrFail($id);
        // $this->authorize('update', $post);

        $categories = Category::with('children')->where('parent_id', 0)->get();
        $features = Feature::get();
        $users = Netizen::get();

        $action = 'Edit';
        return view('post.edit-add', [
            'content' => $post,
            'action' => $action,
            'categories' => $categories,
            'features' => $features,
            'users' => $users
        ]);
    }

    public function update(Request $request, Post $post)
    {

        $this->authorize('update', $post);

        if ($post->status == 'DRAFT' && $request->status == 'PUBLISH') {
            $published_at = now();
        } else {
            $published_at = $post->published_at;
        }

        $post->update([

            'title' => $request->title,
            'slug' => Str::slug($request->title, "-"),
            'description' => $request->description,
            'body' => $request->body,
            'source' => $request->source,
            'source_link' => $request->source_link,
            'feature_id' => $request->feature_id,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'seo_title' => $request->seo_title,
            'author_id' => $request->author_id,
            'published_at' => $published_at
        ]);

        // dd($post->tags->pluck('id'));
        // $post->tags()->sync($post->tags->pluck('id'));
        $post->tags()->detach();
        $post->tags()->attach($request->tags);
        $post->related()->sync($request->related);

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
            $post->image->delete();
            $post->image()->create(['path' => $path, 'caption' => $request->caption]);
        } else {
            $post->image()->update(['caption' => $request->caption]);
        }
        // Meilisearch::get()->index('post')->updateDocuments([
        //     json_decode((new PostResource($post))->toJson(), true)
        // ]);

        $params = [
            'index' => 'article',
            'id'    => $post->id,
            'body'  => [
                'doc'   => json_decode((new PostResource($post))->toJson(), true)
            ]
        ];
        $es = $this->repository->update($params);

        activity()
            ->performedOn($post)
            ->event('update')
            ->withProperties(['data' => $post->with(['tags', 'image'])])
            ->log('update post');

        return redirect()->route('post.index')->with('message', 'Add Successfully');
    }

    public function bulk()
    {
        $posts = Post::query()->get();

        $params = ['body' => []];
        foreach ($posts as $post) {
            $params['body'][] = [
                'index' => [
                    '_index' => 'article',
                    '_id'    => $post->id
                ]
            ];

            $params['body'][] = json_decode((new PostResource($post))->toJson(), true);

            if (count($params['body']) === 1000) {
                $responses = $this->repository->bulk($params);
                $params = ['body' => []];

                unset($responses);
            }
        }

        if (!empty($params['body'])) {
            $responses = $this->repository->bulk($params);
        }

        return redirect()->route('post.index')->with('message', 'Bulk Successfully');
    }

    public function search(Request $request)
    {
        return Post::select(['id', 'title as text'])->where('status', 'PUBLISH')->where('title', 'like', '%' . $request->q . '%')->limit(20)->get();
    }


    public function popup()
    {
        return view('popup.post');
    }
}
