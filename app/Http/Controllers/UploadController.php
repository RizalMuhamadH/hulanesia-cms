<?php

namespace App\Http\Controllers;

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
}
