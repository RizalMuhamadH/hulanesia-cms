<?php

namespace App\Repository;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostRepository
{
    public function store($request, $published_at, $path)
    {
        $post = Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'body' => $request->body,
            'source' => $request->source,
            'source_link' => $request->source_link,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'seo_title' => $request->seo_title,
            'published_at' => $published_at,
            'admin_id' => Auth::user()->hasRole('writter') ? null : Auth::user()->id,
            'author_id' => Auth::user()->hasRole('writter') ? Auth::user()->id : $request->author_id
        ]);


        $post->tags()->attach($request->tags);
        $post->related()->attach($request->related);
        $post->image()->create(['path' => $path, 'caption' => $request->caption]);

        return $post;
    }

    public function update($request, Post $post, $published_at, $path = null)
    {
        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'body' => $request->body,
            'source' => $request->source,
            'source_link' => $request->source_link,
            'category_id' => $request->category_id,
            'status' => $request->status,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'seo_title' => $request->seo_title,
            'published_at' => $published_at,
            'admin_id' => Auth::user()->hasRole('writter') ? null : Auth::user()->id,
            'author_id' => Auth::user()->hasRole('writter') ? Auth::user()->id : $request->author_id
        ]);

        $post->tags()->sync($request->tags);
        $post->related()->sync($request->related);

        if ($path) {
            $post->image->delete();
            $post->image()->create(['path' => $path, 'caption' => $request->caption]);
        } else {
            $post->image()->update(['path' => $path, 'caption' => $request->caption]);
        }

        return $post->fresh();
    }
}
