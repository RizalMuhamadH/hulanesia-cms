<?php

namespace App\Http\Controllers;

use App\Http\Resources\TagResource;
use App\Models\Tag;
use App\Repository\Elasticsearch;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    private $repository;

    public function __construct(Elasticsearch $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $layout = $request->layout ?? 'app';
        return view('tag.index', ['layout' => $layout]);
    }

    public function add(Request $request)
    {
        $action = 'Add';
        $layout = $request->layout ?? 'app';

        return view('tag.edit-add', ['action' => $action, 'layout' => $layout]);
    }

    public function store(Request $request)
    {
        $tag = Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-")
        ]);

        $params = [
            'index' => 'tag',
            'id'    => $tag->id,
            'body'  => json_decode((new TagResource($tag))->toJson(), true)
        ];
        $es = $this->repository->create($params);

        activity()
            ->performedOn($tag)
            ->event('store')
            ->withProperties(['data' => $tag])
            ->log('store tag');

        return redirect()->route('tag.index')->with('message', 'Add Successfully');
    }

    public function edit(Request $request, $id)
    {
        $tag = Tag::findOrFail($id);

        $action = 'Edit';
        $layout = $request->layout ?? 'app';
        return view('tag.edit-add', ['content' => $tag, 'action' => $action, 'layout' => $layout]);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::where('id', $id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-")
        ]);

        $params = [
            'index' => 'tag',
            'id'    => $tag->id,
            'body'  => [
                'doc' => [json_decode((new TagResource($tag))->toJson(), true)]
            ]
        ];
        $es = $this->repository->create($params);

        activity()
            ->performedOn(new Tag())
            ->event('store')
            ->withProperties(['data' => $tag])
            ->log('store tag');

        return redirect()->route('tag.index')->with('message', 'Update Successfully');;
    }

    public function bulk()
    {
        $tags = Tag::query()->get();

        $params = ['body' => []];
        foreach ($tags as $tag) {
            $params['body'][] = [
                'index' => [
                    '_index' => 'tag',
                    '_id'    => $tag->id
                ]
            ];

            $params['body'][] = json_decode((new TagResource($tag))->toJson(), true);

            if (count($params['body']) === 1000) {
                $responses = $this->repository->bulk($params);
                $params = ['body' => []];

                unset($responses);
            }
        }

        if(!empty($params['body'])) {
            $responses = $this->repository->bulk($params);
        }

        return redirect()->route('tag.index')->with('message', 'Bulk Successfully');
    }

    public function search(Request $request)
    {
        return Tag::select(['id', 'name as text'])->where('name', 'like', '%'.$request->q.'%')->limit(20)->get();
    }
}
