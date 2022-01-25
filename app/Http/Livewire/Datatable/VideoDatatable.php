<?php

namespace App\Http\Livewire\Datatable;

use App\Models\Video;
use App\Repository\Elasticsearch;
use Livewire\Component;
use Livewire\WithPagination;

class VideoDatatable extends Component
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
            $this->data = Video::where('name', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $this->data = Video::latest()->paginate(10);
        }
        return view('livewire.datatable.video-datatable', [
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
            'index' => 'video',
            'id'    => $id,
        ];
        $es = Elasticsearch::delete($params);
        
        $category = Video::where('id', $id)->delete();
        activity()
            ->performedOn($category)
            ->event('delete')
            ->withProperties(['data' => $category])
            ->log('delete category');
    }
}
