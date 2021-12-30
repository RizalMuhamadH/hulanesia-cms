<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $tag = Tag::count();
        $category = Category::count();
        $post = Post::count();
        $latest = Post::with(['category', 'image', 'author', 'author.image'])->latest()->take(5)->get();
        return view('dashboard', compact(['user', 'tag', 'category', 'post', 'latest']));
    }
}
