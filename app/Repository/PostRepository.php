<?php

namespace App\Repository;

use App\Enums\PostStatus;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostRepository
{
    public function all()
    {
        return Post::query()->get();;
    }

    public function add()
    {
        $action = 'Add';
        $categories = Category::with('children')->where('parent_id', 0)->get();
        $users = User::get();

        return [
            'action' => $action,
            'categories' => $categories,
            'users' => $users
        ];
    }
    
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
            'status' => $request->status ?? PostStatus::DRAFT,
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

    public function edit($id)
    {
        $action = 'Edit';
        $categories = Category::with('children')->where('parent_id', 0)->get();
        $users = User::get();
        $post = Post::findOrFail($id);

        return [
            'content' => $post,
            'action' => $action,
            'categories' => $categories,
            'users' => $users
        ];
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
            'status' => $request->status ?? PostStatus::DRAFT,
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
            $post->image()->update(['caption' => $request->caption]);
        }

        return $post->fresh();
    }

    public function search($keyword, $limit)
    {
        return Post::select(['id', 'title as text'])->where('status', 'PUBLISH')->where('title', 'like', '%' . $keyword. '%')->limit($limit)->get();
    }
}
