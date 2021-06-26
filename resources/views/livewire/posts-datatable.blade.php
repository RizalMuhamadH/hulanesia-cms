<div class="col-12 col-md-6 col-lg-12">
    <div class="card">

        <div class="card-header d-flex justify-content-between">
            {{-- <h4>Full Width</h4> --}}
            @can('add_posts')
            <a href="{{ route('post.add') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i>
                Add</a>
                
            @endcan
            <div class="card-header-form">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>category</th>
                        <th>Feature</th>
                        <th>Tags</th>
                        <th>Status</th>
                        <th>Author</th>
                        <th>Published</th>
                        <th>Create At</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->feature->name }}</td>
                            <td>
                                @foreach ($item->tags as $tag)
                                    <div class="badge badge-primary">{{ $tag->name }}</div>
                                @endforeach
                            </td>
                            <td>
                                @if ($item->status == 'DRAFT')
                                    <div class="badge badge-danger">{{ $item->status }}</div>
                                @elseif ($item->status == 'PUBLISH')

                                    <div class="badge badge-success">{{ $item->status }}</div>
                                @else
                                    <div class="badge badge-warning">{{ $item->status }}</div>
                                @endif
                            </td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->published_at->format('d, M Y H:m') }}</td>
                            <td>{{ $item->created_at->format('d, M Y H:m') }}</td>
                            <td>
                                @can('edit_posts')
                                <a href="{{ route('post.edit', $item->id) }}" class="btn btn-info">Edit</a>
                                    
                                @endcan
                                @can('delete_posts')
                                <button wire:click="destroy({{ $item->id }})" class="btn btn-danger">Delete</button>
                                    
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    {{-- <tr>
              <td>1</td>
              <td>Irwansyah Saputra</td>
              <td>2017-01-09</td>
              <td><div class="badge badge-success">Active</div></td>
              <td><a href="#" class="btn btn-secondary">Detail</a></td>
            </tr> --}}

                </table>
            </div>
        </div>
        <div class="card-footer text-right">
            {{ $data->links('layouts.custom-pagination') }}
        </div>
    </div>

    <script>

        window.addEventListener('swal:confirm', e => {
            Swal.fire({
                title: e.detail.title,
                text: e.detail.text,
                icon: e.detail.type,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.Livewire.emit('delete', e.detail.id);
                }
            });
        });
    </script>
</div>
