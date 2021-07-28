<?php

namespace App\Http\Livewire;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class SettingsDatatable extends Component
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
            $this->data = Setting::where('name', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $this->data = Setting::latest()->paginate(10);
        }

        return view('livewire.settings-datatable', [
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
            ->log('delete setting');
    }
}
