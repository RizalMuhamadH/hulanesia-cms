<?php

namespace App\Http\Livewire;


use App\Models\Post;
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
            $this->data = Post::with(['category', 'feature', 'image', 'tags', 'user'])->where('title', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $this->data = Post::with(['category', 'feature', 'image', 'tags', 'user'])->latest()->paginate(10);
        }

        return view('livewire.posts-datatable', [
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
        User::where('id', $id)->delete();
    }
}
