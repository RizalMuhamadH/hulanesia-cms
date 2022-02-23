<?php

namespace App\Http\Livewire\Datatable;

use App\Enums\PostStatus;
use App\Models\Post;
use App\Helpers\Meilisearch;
use App\Repository\Elasticsearch;
use Livewire\Component;
use Livewire\WithPagination;

class PostsDatatable extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $layout;
    private $data = [];

    protected $updatesQueryString = [
        ['query' => ['search' => '']]
    ];

    protected $listeners = ['delete' => 'delete'];

    public function mount($layout)
    {
        $this->layout = $layout;
    }

    public function render()
    {
        if ($this->search != null) {
            $layout = $this->layout;
            $this->data = Post::with(['category', 'feature', 'image', 'tags', 'user', 'author'])->where(function ($q) use ($layout) {
                $q->where('title', 'like', '%' . $this->search . '%');
                if($layout == 'popup'){
                    $q->where('status', PostStatus::PUBLISH);
                }
            })->latest()->paginate(10)->appends(array('search' => $this->search));
        } else {
            $this->data = Post::with(['category', 'feature', 'image', 'tags', 'user', 'author'])->where(function ($q) {
                if($this->layout == 'popup'){
                    $q->where('status', PostStatus::PUBLISH);
                }
            })->latest()->paginate(10);
        }

        return view('livewire.datatable.posts-datatable', [
            'data' => $this->data
        ]);
    }

    public function destroy($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => 'Are you sure?',
            'type'  => 'warning',
            'text'  => '',
            'id'    => $id
        ]);
    }


    public function delete($id)
    {
        $params = [
            'index' => 'article',
            'id'    => $id,
        ];
        $es = Elasticsearch::delete($params);

        $post = Post::where('id', $id)->delete();

        activity()
            ->performedOn($post)
            ->event('delete')
            ->withProperties(['data' => $post->with(['tags', 'image'])])
            ->log('delete post');
    }
}
