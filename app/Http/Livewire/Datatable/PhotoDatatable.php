<?php

namespace App\Http\Livewire\Datatable;

use App\Helpers\Meilisearch;
use App\Models\Photo;
use Livewire\Component;
use Livewire\WithPagination;

class PhotoDatatable extends Component
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
            $this->data = Photo::with(['user'])->where('title', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $this->data = Photo::with(['user'])->latest()->paginate(10);
        }

        return view('livewire.datatable.photo-datatable', [
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
        
        Meilisearch::get()->index('photo')->deleteDocument($id);
        
        $photo = Photo::where('id', $id)->delete();

        activity()
            ->performedOn($photo)
            ->event('delete')
            ->withProperties(['data' => $photo->with(['images'])])
            ->log('delete photo');
    }
}
