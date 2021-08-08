<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContentTypes\MultipleImageHandler;
use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Facades\LogBatch;
use Spatie\Activitylog\Models\Activity;

class PhotoController extends Controller
{
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
            'user_id' => Auth::user()->id
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

            $path = (new MultipleImageHandler($request, 'photos', 'images', $options))->handle();
            $photo->image()->create(['path' => $path, 'caption' => $request->caption, 'photographer' => $request->photographer, 'source' => $request->source]);
        }


        activity()
            ->performedOn(new Photo())
            ->event('store')
            ->withProperties(['data' => $photo->with(['tags', 'image'])])
            ->log('store photo');

        return redirect()->route('photo.index')->with('message', 'Add Successfully');
    }

    public function edit($id)
    {
        $photo = Photo::findOrFail($id);

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

            $path = (new MultipleImageHandler($request, 'photos', 'images', $options))->handle();
            $photo->image()->create(['path' => $path, 'caption' => $request->caption]);
        } else {
            $photo->image()->update(['caption' => $request->caption, 'photographer' => $request->photographer, 'source' => $request->source]);
        }

        activity()
            ->performedOn($photo)
            ->event('update')
            ->withProperties(['data' => $photo->with(['tags', 'image'])])
            ->log('update photo');

        return redirect()->route('photo.index')->with('message', 'Add Successfully');
    }
}
