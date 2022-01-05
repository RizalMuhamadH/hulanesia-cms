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

    public function index()
    {
        return view('tag.index');
    }

    public function add()
    {
        $action = 'Add';

        return view('tag.edit-add', ['action' => $action]);
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

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);

        $action = 'Edit';
        return view('tag.edit-add', ['content' => $tag, 'action' => $action]);
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
}
