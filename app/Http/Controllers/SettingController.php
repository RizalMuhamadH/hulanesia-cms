<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting.index');
    }

    public function add()
    {
        $action = 'Add';

        return view('setting.edit-add',['action' => $action]);
    }

    public function store(Request $request)
    {
        $setting = Setting::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-"),
            'content' => $request->content,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'seo_title' => $request->seo_title,

        ]);

        activity()
            ->performedOn($setting)
            ->event('store')
            ->withProperties(['data' => $setting])
            ->log('store setting');

        return redirect()->route('setting.index')->with('message', 'Add Successfully');
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);

        $action = 'Edit';
        return view('setting.edit-add', ['content' => $setting, 'action' => $action]);
    }

    public function update(Request $request, $id)
    {
        $update = Setting::where('id', $id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-"),
            'content' => $request->content,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'seo_title' => $request->seo_title,
        ]);

        activity()
            ->performedOn(new Setting())
            ->event('update')
            ->withProperties(['data' => $update])
            ->log('update setting');

        return redirect()->route('setting.index')->with('message', 'Update Successfully');
    }
}
