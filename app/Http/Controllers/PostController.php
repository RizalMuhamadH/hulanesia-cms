<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index');
    }

    public function add()
    {
        $action = 'Add';

        return view('post.edit-add',['action' => $action]);
    }
}
