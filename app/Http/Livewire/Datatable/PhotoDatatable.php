<?php

namespace App\Http\Livewire\Datatable;

use App\Helpers\Meilisearch;
use App\Models\Photo;
use App\Repository\Elasticsearch;
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
            $this->data = Photo::with(['editor'])->where('title', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $this->data = Photo::with(['editor'])->latest()->paginate(10);
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

        $params = [
            'index' => 'photo',
            'id'    => $id,
        ];
        $es = Elasticsearch::delete($params);

        $photo = Photo::with('images')->find($id);

        activity()
            ->performedOn(new Photo())
            ->event('delete')
            ->withProperties(['data' => $photo])
            ->log('delete photo');

        $photo->delete();
    }
}
