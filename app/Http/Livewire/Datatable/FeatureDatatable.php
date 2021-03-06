<?php

namespace App\Http\Livewire\Datatable;

use App\Models\Feature;
use Livewire\Component;
use Livewire\WithPagination;

class FeatureDatatable extends Component
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
            $this->data = Feature::where('name', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $this->data = Feature::latest()->paginate(10);
        }

        return view('livewire.datatable.feature-datatable', [
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
        $feature = Feature::where('id', $id)->delete();
        activity()
            ->performedOn($feature)
            ->event('delete')
            ->withProperties(['data' => $feature])
            ->log('delete feature');
    }
}
