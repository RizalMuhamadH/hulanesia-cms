<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContentTypes\ImageHandler;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Feature;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index');
    }

    public function add()
    {
        $action = 'Add';
        $categories = Category::get();
        $tags = Tag::get(); 
        $features = Feature::get();
        return view('post.edit-add',[
            'action' => $action,
            'categories' => $categories,
            'tags' => $tags,
            'features' => $features
        ]);
    }

    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->name, "-"),
            'description' => $request->description,
            'body' => $request->body,
            'source' => $request->source,
            'source_link' => $request->source_link,
            'feature_id' => $request->feature_id,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'status' => $request->status,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'seo_title' => $request->seo_title,
            'published_at' => $request->published_at,
            'user_id' => Auth::user()->id
        ]);

        $post->tags()->attach($request->tags);

        if($request->hasFile('image')){

            $options = [
                "resize" => [
                    "width"=> "1024",
                    "height"=> "null"
                ],
                "quality"=> "70%",
                "upsize"=> true,
                "thumbnails"=> [
                    [
                        "name"=> "medium",
                        "scale"=> "50%"
                    ],
                    [
                        "name"=> "small",
                        "scale"=> "25%"
                    ],
                    [
                        "name"=> "cropped",
                        "crop"=> [
                            "width"=> "300",
                            "height"=> "250"
                        ]
                    ]
                ]
            ];
            $options = json_decode(json_encode($options));
            
            $path = (new ImageHandler($request, 'posts', 'image', $options))->handle();
            $post->image()->create(['path' => $path]);
        }

        return redirect()->route('post.index')->with('message', 'Add Successfully');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        
        $categories = Category::get();
        $tags = Tag::get(); 
        $features = Feature::get();

        $action = 'Edit';
        return view('post.edit-add', [
            'content' => $post, 
            'action' => $action,
            'categories' => $categories,
            'tags' => $tags,
            'features' => $features
    ]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->update([

            'title' => $request->title,
            'slug' => Str::slug($request->name, "-"),
            'description' => $request->description,
            'body' => $request->body,
            'source' => $request->source,
            'source_link' => $request->source_link,
            'feature_id' => $request->feature_id,
            'category_id' => $request->category_id,
            'user_id' => $request->user_id,
            'status' => $request->status,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'seo_title' => $request->seo_title,
            'published_at' => $request->published_at
        ]);

        
        $post->tags()->delete();
        $post->tags()->attach($request->tags);

        if($request->hasFile('image')){

            $options = [
                "resize" => [
                    "width"=> "1024",
                    "height"=> "null"
                ],
                "quality"=> "70%",
                "upsize"=> true,
                "thumbnails"=> [
                    [
                        "name"=> "medium",
                        "scale"=> "50%"
                    ],
                    [
                        "name"=> "small",
                        "scale"=> "25%"
                    ],
                    [
                        "name"=> "cropped",
                        "crop"=> [
                            "width"=> "300",
                            "height"=> "250"
                        ]
                    ]
                ]
            ];
            $options = json_decode(json_encode($options));
            
            $path = (new ImageHandler($request, 'posts', 'image', $options))->handle();
            $post->image()->delete();
            $post->image()->create(['path' => $path]);
        }

        return redirect()->route('post.index')->with('message', 'Add Successfully');
    }
}
