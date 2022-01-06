<?php

namespace App\Http\Controllers;

use App\Http\Resources\SettingResource;
use App\Repository\Elasticsearch;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Setting;

class SettingController extends Controller
{
    private $repository;

    public function __construct(Elasticsearch $repository)
    {
        $this->repository = $repository;
    }

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

        $params = [
            'index' => 'setting',
            'id'    => $setting->id,
            'body'  => json_decode((new SettingResource($setting))->toJson(), true)
        ];
        $es = $this->repository->create($params);

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

    public function update(Request $request, Setting $setting)
    {
        $setting->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-"),
            'content' => $request->content,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'seo_title' => $request->seo_title,
        ]);

        $params = [
            'index' => 'setting',
            'id'    => $setting->id,
            'body'  => [
                'doc'   => json_decode((new PostResource($setting))->toJson(), true)
            ]
        ];
        $es = $this->repository->update($params);

        activity()
            ->performedOn(new Setting())
            ->event('update')
            ->withProperties(['data' => $setting])
            ->log('update setting');

        return redirect()->route('setting.index')->with('message', 'Update Successfully');
    }

    public function bulk()
    {
        $settings = Setting::query()->get();

        $params = ['body' => []];

        foreach ($settings as $setting) {
            $params['body'][] = [
                'index' => [
                    '_index' => 'setting',
                    '_id' => $setting->id
                ]
            ];

            $params['body'][] = json_decode((new SettingResource($setting))->toJson(), true);
        }

        $this->repository->bulk($params);

        return redirect()->route('setting.index')->with('message', 'Bulk Successfully');
    }
}
