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
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-")
        ]);
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

        return redirect()->route('category.index')->with('message', 'Update Successfully');;
    }
}
