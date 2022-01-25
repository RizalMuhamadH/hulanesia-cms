<?php

namespace App\Http\Controllers;

use App\Helpers\Meilisearch;
use App\Http\Controllers\ContentTypes\MultipleImageHandler;
use App\Http\Resources\PhotoResource;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\User;
use App\Repository\Elasticsearch;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Facades\LogBatch;
use Spatie\Activitylog\Models\Activity;

class PhotoController extends Controller
{
    private $repository;

    public function __construct(Elasticsearch $repository)
    {
        $this->repository = $repository;
    }
    
    public function index()
    {
        return view('photo.index');
    }

    public function add()
    {


        $action = 'Add';
        $users = User::get();

        return view('photo.edit-add', [
            'action' => $action,
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $photo = Photo::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title, "-"),
            'description' => $request->description,
            'admin_id' => Auth::user()->id
        ]);

        if ($request->hasFile('images')) {

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

            $paths = (new MultipleImageHandler($request, 'photos', 'images', $options))->handle();
            for ($i=0; $i < count($paths); $i++) { 
                $images[$i] = ['path' => $paths[$i], 'caption' => $request->caption, 'photographer' => $request->photographer, 'source' => $request->source];
            }
            $photo->images()->createMany([...$images]);
        }

        $params = [
            'index' => 'photo',
            'id'    => $photo->id,
            'body'  => json_decode((new PhotoResource($photo))->toJson(), true)
        ];
        $es = $this->repository->create($params);

        activity()
            ->performedOn(new Photo())
            ->event('store')
            ->withProperties(['data' => $photo->with(['tags', 'image'])])
            ->log('store photo');

        return redirect()->route('photo.index')->with('message', 'Add Successfully');
    }

    public function edit($id)
    {
        $photo = Photo::with(['images'])->findOrFail($id);

        $users = User::get();

        $action = 'Edit';
        return view('photo.edit-add', [
            'content' => $photo,
            'action' => $action,
            'users' => $users
        ]);
    }

    public function update(Request $request, Photo $photo)
    {
        $photo->update([

            'title' => $request->title,
            'slug' => Str::slug($request->title, "-"),
            'description' => $request->description
        ]);

        if ($request->hasFile('images')) {

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

            $paths = (new MultipleImageHandler($request, 'photos', 'images', $options))->handle();
            for ($i=0; $i < count($paths); $i++) { 
                $images[$i] = ['path' => $paths[$i], 'caption' => $request->caption, 'photographer' => $request->photographer, 'source' => $request->source];
            }
            
            $photo->images()->createMany([...$images]);
        } else {
            $photo->images()->update(['caption' => $request->caption, 'photographer' => $request->photographer, 'source' => $request->source]);
        }

        $params = [
            'index' => 'photo',
            'id'    => $photo->id,
            'body'  => ['doc' => json_decode((new PhotoResource($photo))->toJson(), true)]
        ];
        $es = $this->repository->create($params);

        activity()
            ->performedOn($photo)
            ->event('update')
            ->withProperties(['data' => $photo->with(['tags', 'image'])])
            ->log('update photo');

        return redirect()->route('photo.index')->with('message', 'Add Successfully');
    }

    public function bulk()
    {
        $photos = Photo::query()->get();

        $params = ['body' => []];
        foreach ($photos as $photo) {
            $params['body'][] = [
                'index' => [
                    '_index' => 'photo',
                    '_id'    => $photo->id
                ]
            ];

            $params['body'][] = json_decode((new PhotoResource($photo))->toJson(), true);

            if (count($params['body']) === 1000) {
                $responses = $this->repository->bulk($params);
                $params = ['body' => []];

                unset($responses);
            }
        }

        if(!empty($params['body'])) {
            $responses = $this->repository->bulk($params);
        }

        return redirect()->route('photo.index')->with('message', 'Bulk Successfully');
    }
}
