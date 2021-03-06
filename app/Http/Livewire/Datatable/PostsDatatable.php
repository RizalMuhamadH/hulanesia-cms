<?php

namespace App\Http\Livewire\Datatable;

use App\Enums\PostStatus;
use App\Models\Post;
use App\Helpers\Meilisearch;
use App\Http\Resources\PostResource;
use App\Notifications\SendPushNotification;
use App\Repository\Elasticsearch;
use App\Repository\PushNotification;
use Livewire\Component;
use Illuminate\Support\Facades\Notification;
use Livewire\WithPagination;

class PostsDatatable extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;
    public $layout;
    public $style;
    public $status = "all";
    private $data = [];

    protected $updatesQueryString = [
        ['query' => ['search' => '']]
    ];

    protected $listeners = ['delete' => 'delete', 'restore' => 'restore', 'notify' => 'notify'];

    public function mount($layout, $status, $style)
    {
        $this->layout = $layout;
        $this->status = $status;
        $this->style = $style;
    }

    public function render()
    {

        $layout = $this->layout;
        $posts = Post::with(['category', 'image', 'tags', 'user', 'author']);
        if (strtoupper($this->status) == PostStatus::TRASH->value) $posts->onlyTrashed();
        $posts->where(function ($q) use ($layout) {
            if ($this->search != null) {
                $q->where('title', 'like', '%' . $this->search . '%');
            }
            if ($layout == 'popup') {
                $q->where('status', PostStatus::PUBLISH);
            } else {
                if (auth()->user()->hasRole('writter')) {
                    $q->where('author_id', auth()->user()->id);
                }
                switch (strtoupper($this->status)) {
                    case PostStatus::DRAFT->value:
                        $q->where('status', PostStatus::DRAFT);
                        break;
                    case PostStatus::PUBLISH->value:
                        $q->where('status', PostStatus::PUBLISH);
                        break;
                }
            }
        });

        $this->data = $posts->latest()->paginate(10)->appends(array('search' => $this->search));

        return view('livewire.datatable.posts-datatable', [
            'data' => $this->data
        ]);
    }

    public function notify($id)
    {
        $post = Post::findOrFail($id);
        $post->notify(new SendPushNotification());
        // Notification::send($post, new SendPushNotification(null, 'Berita', $item['title'], env('STORAGE').'/atorage/'.$item['image'], $item['url']));
        // auth()->user()->notify(new SendPushNotification(null, 'Berita', $item['title'], env('STORAGE').'/atorage/'.$item['image'], $item['url']));

        // $push = new PushNotification();
        // $push->sendNotification($item['title'], "Berita Terbaru", $item['title'], env('STORAGE').'/atorage/'.$item['image'], $item['url'], "web");

        $this->dispatchBrowserEvent('swal:response', [
            'title' => 'Notification has been send.',
            'type'  => 'success'
        ]);
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

    public function forceDelete($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'title' => 'Are you sure?',
            'type'  => 'warning',
            'text'  => 'Delete permanently',
            'id'    => $id,
            'force' => true
        ]);
    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        if (auth()->user()->can('restore', $post)) {
            $post->restore();
            $post->update(['status' => PostStatus::DRAFT]);

            $params = [
                'index' => 'article',
                'id'    => $post->id,
                'body'  => json_decode((new PostResource($post))->toJson(), true)
            ];
            $es = new Elasticsearch();
            $es->create($params);

            activity()
                ->performedOn($post)
                ->event('restore')
                ->withProperties(['data' => $post->with(['tags', 'image'])])
                ->log('Restored');


            $this->dispatchBrowserEvent('swal:response', [
                'title' => 'Post has been restore.',
                'type'  => 'success'
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:response', [
                'title' => 'You are not authorized to restore this post.',
                'type'  => 'error'
            ]);
        }
    }


    public function delete($params)
    {
        // dd($params['id']);


        $post = Post::withTrashed()->findOrFail($params['id']);
        if (auth()->user()->can('delete', $post) || auth()->user()->can('forceDelete', $post)) {
            if ($params['force']) {
                $post->forceDelete();
            } else {
                $data = [
                    'index' => 'article',
                    'id'    => $params['id'],
                ];
                if($post->status == PostStatus::PUBLISH){
                    $es = new Elasticsearch();
                    $es->delete($data);
                }

                $post->update([
                    'status' => PostStatus::TRASH
                ]);

                $post->delete();
            }

            activity()
                ->performedOn($post)
                ->event($params['force'] ? 'forceDelete' : 'delete')
                ->withProperties(['data' => $post->with(['tags', 'image'])])
                ->log($params['force'] ? 'force delete post' : 'delete post');

            $this->dispatchBrowserEvent('swal:response', [
                'title' => $params['force'] ? 'Post has been delete permanently.' : 'Post has been deleted.',
                'type'  => 'success'
            ]);
        } else {
            $this->dispatchBrowserEvent('swal:response', [
                'title' => 'You are not authorized to delete this post.',
                'type'  => 'error'
            ]);
        }
    }
}
