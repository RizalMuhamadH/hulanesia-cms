<?php

namespace App\Http\Controllers;

use App\Helpers\Meilisearch;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Repository\Elasticsearch;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $repository;

    public function __construct(Elasticsearch $repository)
    {
        $this->repository = $repository;
    }
    
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
            'title' => $request->title,
            'description' => $request->description,
            'present' => $request->present,
            'parent_id' => $request->parent_id,
            'order' => $request->order
        ]);

        $params = [
            'index' => 'category',
            'id'    => $category->id,
            'body'  => json_decode((new CategoryResource($category))->toJson(), true)
        ];
        $es = $this->repository->create($params);

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

    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, "-"),
            'title' => $request->title,
            'description' => $request->description,
            'present' => $request->present,
            'parent_id' => $request->parent_id,
            'order' => $request->order
        ]);

        $params = [
            'index' => 'category',
            'id'    => $category->id,
            'body'  => [
                'doc' => json_decode((new CategoryResource($category))->toJson(), true)
                ]
        ];
        $es = $this->repository->update($params);

        activity()
            ->performedOn(new Category())
            ->event('update')
            ->withProperties(['data' => $category])
            ->log('update category');

        return redirect()->route('category.index')->with('message', 'Update Successfully');;
    }

    public function bulk()
    {
        $categories = Category::query()->get();

        $params = ['body' => []];

        foreach ($categories as $category) {
            $params['body'][] = [
                'index' => [
                    '_index' => 'category',
                    '_id' => $category->id
                ]
            ];

            $params['body'][] = json_decode((new CategoryResource($category))->toJson(), true);
        }

        $this->repository->bulk($params);

        return redirect()->route('category.index')->with('message', 'Bulk Successfully');
    }
}
