<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FeatureController extends Controller
{
    public function index()
    {
        return view('feature.index');
    }

    public function add()
    {
        $action = 'Add';

        return view('feature.edit-add',['action' => $action]);
    }

    public function store(Request $request)
    {
        Feature::create([
            'name' => $request->name
        ]);
        return redirect()->route('feature.index')->with('message', 'Add Successfully');
    }

    public function edit($id)
    {
        $feature = Feature::findOrFail($id);

        $action = 'Edit';
        return view('feature.edit-add', ['content' => $feature, 'action' => $action]);
    }

    public function update(Request $request, $id)
    {
        $update = Feature::where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('feature.index')->with('message', 'Update Successfully');;
    }
}
