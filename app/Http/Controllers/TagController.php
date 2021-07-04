<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        return view('tag.index');
    }

    public function add()
    {
        $action = 'Add';

        return view('tag.edit-add',['action' => $action]);
    }

    public function store(Request $request)
    {
        $tag = Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-")
        ]);

        activity()
            ->performedOn($tag)
            ->event('store')
            ->withProperties(['data' => $tag])
            ->log('store tag');

        return redirect()->route('tag.index')->with('message', 'Add Successfully');
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        $action = 'Edit';
        return view('tag.edit-add', ['content' => $tag, 'action' => $action]);
    }

    public function update(Request $request, $id)
    {
        $update = Tag::where('id', $id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-")
        ]);

        activity()
            ->performedOn($update)
            ->event('store')
            ->withProperties(['data' => $update])
            ->log('store tag');

        return redirect()->route('tag.index')->with('message', 'Update Successfully');;
    }
}
