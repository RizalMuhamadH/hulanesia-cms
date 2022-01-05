<?php

namespace App\Http\Livewire\Modal;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleModal extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    private $data = [];

    protected $updatesQueryString = [
        ['query' => ['search' => '']]
    ];
    
    public function render()
    {

        if ($this->search != null) {
            $this->data = Post::with(['category'])->where('status', 'PUBLISH')->where('title', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $this->data = Post::with(['category'])->where('status', 'PUBLISH')->latest()->paginate(10);
        }
        
        return view('livewire.modal.article-modal', [
            'data' => $this->data
        ]);
    }
}
