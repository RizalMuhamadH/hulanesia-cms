<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContentTypes\ImageHandler;
use App\Http\Controllers\ContentTypes\MultipleImageHandler;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function image(Request $request)         
    {
        $options = [
            "resize" => [
                "width"=> "1024",
                "height"=> "null"
            ]
        ];
        $options = json_decode(json_encode($options));
        
        $path = (new ImageHandler($request, 'images', 'image', $options))->handle();

        return ['location' => $path];
    }

    public function upload(Request $request)
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
        
        $paths = (new MultipleImageHandler($request, 'photos', 'images', $options))->handle();

        return $paths[0] ?? '';
    }
}
