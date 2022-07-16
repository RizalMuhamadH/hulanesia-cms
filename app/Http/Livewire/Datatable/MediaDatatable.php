<?php

namespace App\Http\Livewire\Datatable;

use App\Http\Controllers\ContentTypes\ImageHandler;
use App\Models\Media;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class MediaDatatable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $layout;
    private $data = [];

    protected $updatesQueryString = [
        ['query' => ['search' => '']]
    ];

    protected $listeners = ['delete' => 'delete'];

    public function render()
    {
        $this->layout = request()->layout ?? 'app';
        
        if ($this->search != null) {
            $this->data = Media::where('caption', 'like', '%' . $this->search . '%')->latest()->paginate(10);
        } else {
            $this->data = Media::latest()->paginate(10);
        }
        return view('livewire.datatable.media-datatable', [
            'data' => $this->data
        ])->extends('layouts.'.(request()->layout ?? 'app'))->layoutData(['title' => 'Media'])->section('body');
    }

    public function destroy($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => 'Are you sure?',
            'type'  => 'warning',
            'text'  => '',
            'id'    => $id,
            'force' => false
        ]);
    }

    public function delete($params)
    {
        $media = Media::findOrFail($params['id']);

        $media->delete();

            activity()
                ->performedOn($media)
                ->event('delete')
                ->withProperties(['data' => $media])
                ->log('delete media');

            $this->dispatchBrowserEvent('swal:response', [
                'title' => 'Media has been deleted.',
                'type'  => 'success'
            ]);
    }
}
