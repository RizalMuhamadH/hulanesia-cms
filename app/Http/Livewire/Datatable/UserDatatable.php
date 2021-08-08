<?php

namespace App\Http\Livewire\Datatable;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserDatatable extends Component
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
            $this->data = User::with(['roles'])->where('name', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $this->data = User::with(['roles'])->latest()->paginate(10);
        }
        return view('livewire.datatable.user-datatable', [
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
        $user = User::where('id', $id)->delete();
        activity()
            ->performedOn($user)
            ->event('delete')
            ->withProperties(['data' => $user])
            ->log('delete user');
    }
}
