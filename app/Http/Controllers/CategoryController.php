<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        return view('category.index');
    }

    public function add()
    {
        $action = 'Add';

        $parents = Category::where('parent_id', 0)->get();

        return view('category.edit-add',['action' => $action, 'parents' => $parents]);
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-"),
            'parent_id' => $request->parent_id,
            'order' => $request->order
        ]);

        activity()
            ->performedOn(new Category())
            ->event('store')
            ->withProperties(['data' => $category])
            ->log('store category');

        return redirect()->route('category.index')->with('message', 'Add Successfully');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        
        $parents = Category::where('parent_id', 0)->get();

        $action = 'Edit';
        return view('category.edit-add', ['content' => $category, 'action' => $action, 'parents' => $parents]);
    }

    public function update(Request $request, $id)
    {
        $update = Category::where('id', $id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-"),
            'parent_id' => $request->parent_id,
            'order' => $request->order
        ]);

        activity()
            ->performedOn(new Category())
            ->event('update')
            ->withProperties(['data' => $update])
            ->log('update category');

        return redirect()->route('category.index')->with('message', 'Update Successfully');;
    }
}
