<div class="col-12 col-md-6 col-lg-12">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        {{-- <h4>Full Width</h4> --}}
        @can('add_videos')
        <a href="{{ route('video.add') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-plus"></i> Add</a>
          
        @endcan
        <div class="card-header-form">
            <form>
              <div class="input-group">
                <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="Search">
                {{-- <div class="input-group-btn">
                  <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                </div> --}}
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
              <th>Video ID</th>
              <th>Status</th>
              <th>Duration</th>
              <th>Create At</th>
              <th>Action</th>
            </tr>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->vid }}</td>
                <td>{{ $item->status == 0 ? 'FALSE' : 'TRUE' }}</td>
                <td>{{ $item->duration }}</td>
                <td>{{ $item->created_at->format('d, M Y H:i') }}</td>
                <td>
                  @can('edit_videos')
                  <a href="{{ route('video.edit', $item->id) }}" class="btn btn-info">Edit</a>
                    
                  @endcan
                  @can('delete_videos')
                  <button wire:click="destroy({{ $item->id }})" class="btn btn-danger">Delete</button>
                    
                  @endcan
                </td>
              </tr>
            @endforeach
            
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
