<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContentTypes\ImageHandler;
use App\Http\Requests\MediaRequest;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MediaRequest $request)
    {
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

        $path = (new ImageHandler($request, 'media', 'image', $options))->handle();

        Media::create([
            'caption' => $request['caption'],
            'photographer' => $request['photographer'],
            'source' => $request['source'],
            'path' => $path,
            'type' => 'image',
        ]);

        return redirect()->route('media.index')->with('message', 'Add Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }
}
