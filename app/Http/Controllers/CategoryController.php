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

        return view('category.edit-add',['action' => $action]);
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-")
        ]);

        activity()
            ->performedOn($category)
            ->event('store')
            ->withProperties(['data' => $category])
            ->log('store category');

        return redirect()->route('category.index')->with('message', 'Add Successfully');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $action = 'Edit';
        return view('category.edit-add', ['content' => $category, 'action' => $action]);
    }

    public function update(Request $request, $id)
    {
        $update = Category::where('id', $id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-")
        ]);

        activity()
            ->performedOn($update)
            ->event('update')
            ->withProperties(['data' => $update])
            ->log('update category');

        return redirect()->route('category.index')->with('message', 'Update Successfully');;
    }
}
