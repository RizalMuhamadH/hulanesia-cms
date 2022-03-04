<?php

namespace App\Http\Livewire\Management;

use App\Enums\IndexState;
use App\Http\Resources\PostListResource;
use App\Models\Post;
use App\Repository\Elasticsearch;
use Illuminate\Support\Arr;
use Livewire\Component;

class FeatureManagement extends Component
{
    public $size = 5;
    public $items = [];
    public $title = '';
    private $source = [];
    private $index = "";
    protected $repo;
    protected $listeners = ['select' => 'select'];

    public function mount($slug)
    {
        if(IndexState::tryFrom($slug) != null) {
            $this->index = $slug;
            $this->title = str()->title(str()->replace('_',' ', $slug));
        } else {
            abort(404);
        }
        
        $this->repo = new Elasticsearch();

        if(!$this->repo->existIndex(['index' => $this->index])) {
            $this->repo->createIndex(['index' => $this->index]);
        }

        $repo = $this->repo->search([
            'index' => $this->index,
        ]);

        foreach ($repo['hits']['hits'] as $hit) {
            $this->source[] = $hit['_source'];
        }

        $this->items = $this->source;

    }

    public function render()
    {
        return view('livewire.management.feature-management')->extends('layouts.app')->layoutData(['title' => 'Management '.$this->title])->section('body');
    }

    public function select($id)
    {
        $post = Post::find($id)->first();
        // dd($post);

        $this->items = Arr::prepend($this->items, json_decode((new PostListResource($post))->toJson(), true));
    }

    public function removeItem($index)
    {
        $items = collect($this->items);
        $items->splice($index, 1);

        $this->items = $items->all();
    }

    public function bulk()
    {
        $this->bulkDelete();

        $items = $this->items;
        $params = ['body' => []];
        foreach ($items as $key => $item) {
            $params['body'][] = [
                'index' => [
                    '_index' => $this->index,
                    '_id'    => $key + 1
                ]
            ];

            $params['body'][] = $item;
        }

        if (count($items) != 0) {
            $this->repo->bulk($params);

            $this->dispatchBrowserEvent('swal:response', [
                'title' => 'Post has been added successfully.',
                'type'  => 'success'
            ]);
        }
    }

    public function bulkDelete()
    {
        $params = ['body' => []];
        foreach ($this->source as $key => $item) {
            $params['body'][] = [
                'delete' => [
                    '_index' => $this->index,
                    '_id'    => $key + 1
                ]
            ];
        }

        if (count($this->source) != 0) {
            $this->repo->bulk($params);
        }
    }
}
