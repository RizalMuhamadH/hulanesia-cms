<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryDatatable extends Component
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
            $this->data = Category::where('name', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $this->data = Category::latest()->paginate(10);
        }
        return view('livewire.category-datatable', [
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
        Category::where('id', $id)->delete();
    }
}
