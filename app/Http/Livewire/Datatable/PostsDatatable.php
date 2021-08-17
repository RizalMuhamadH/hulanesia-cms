<?php

namespace App\Http\Livewire\Datatable;


use App\Models\Post;
use App\Helpers\Meilisearch;
use Livewire\Component;
use Livewire\WithPagination;

class PostsDatatable extends Component
{
    
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    private $data = [];

    protected $updatesQueryString = [
        ['query' => ['search' => '']]
    ];

    protected $listeners = ['delete' => 'delete'];

    public function render()
    {
        if ($this->search != null) {
            $this->data = Post::with(['category', 'feature', 'image', 'tags', 'user', 'author'])->where('title', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $this->data = Post::with(['category', 'feature', 'image', 'tags', 'user', 'author'])->latest()->paginate(10);
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
        Meilisearch::get()->deleteDocument($id);

        $post = Post::where('id', $id)->delete();

        activity()
            ->performedOn($post)
            ->event('delete')
            ->withProperties(['data' => $post->with(['tags', 'image'])])
            ->log('delete post');
    }
}
