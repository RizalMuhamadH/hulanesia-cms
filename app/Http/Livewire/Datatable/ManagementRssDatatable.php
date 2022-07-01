<?php

namespace App\Http\Livewire\Datatable;

use App\Models\ManagementRss;
use Livewire\Component;
use Livewire\WithPagination;

class ManagementRssDatatable extends Component
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
            $this->data = ManagementRss::with(['category'])->where('name', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $this->data = ManagementRss::with(['category'])->latest()->paginate(10);
        }

        return view('livewire.datatable.management-rss-datatable', [
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

        $rss = ManagementRss::find($id);

        activity()
            ->performedOn($rss)
            ->event('delete')
            ->withProperties(['data' => $rss])
            ->log('delete photo');

        $rss->delete();
    }
}
