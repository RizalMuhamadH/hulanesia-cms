<?php

namespace App\Http\Livewire\Datatable;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class TagDatatable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $layout;
    private $data = [];

    public function mount($layout)
    {
        $this->layout = $layout;
    }

    protected $updatesQueryString = [
        ['query' => ['search' => '']]
    ];

    protected $listeners = ['delete' => 'delete'];
    
    public function render()
    {
        if ($this->search != null) {
            $this->data = Tag::where('name', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $this->data = Tag::latest()->paginate(10);
        }

        return view('livewire.datatable.tag-datatable', [
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
        $tag = Tag::where('id', $id)->delete();
        activity()
            ->performedOn($tag)
            ->event('delete')
            ->withProperties(['data' => $tag])
            ->log('delete tag');
    }
}
