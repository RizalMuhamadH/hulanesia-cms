<div>
    <div class="section-header">
        <h1>Management</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">{{ $title }}</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="d-flex mb-4">
            {{-- @if (count($items) < $size) --}}
            <button type="button" @disabled(count($items) >= $size)
                class="btn-popup btn btn-icon icon-left btn-primary mt-3 mr-4" data-title="Tambah/Edit Tag"
                data-url="{{ route('post.index', ['layout' => 'popup', 'style' => 'choice']) }}"><i
                    class="fas fa-plus"></i>
                Add</button>
            {{-- @endif --}}
            @if ($slug == 'popular')
                <button type="button" wire:click="popularAnalytic()"
                    class="btn btn-icon icon-left btn-primary mt-3 mr-4"><i class="far fa-arrow-alt-circle-down"></i>
                    Load Popular</button>
            @endif
            <button type="button" wire:click="bulk()" class="btn btn-icon icon-left btn-primary mt-3 mr-4"><i
                    class="fas fa-save"></i>
                Save</button>
        </div>
        {{-- <div class="row">
            @foreach ($items as $item)
                <div class="col-12 col-md-4 col-lg-4">
                    <article class="article article-style-c">
                        <div class="article-header">
                            <img src="{{ env('STORAGE') }}{{ $item['image'] }}" class="img-fluid"
                                alt="{{ $item['title'] }}" srcset="">
                            <div class="article-badge">
                                <div wire:click="removeItem({{ $loop->index }})" class="article-badge-item bg-danger"
                                    style="cursor: pointer"><i class="fas fa-trash"></i> Delete</div>
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="article-title">
                                <h2><a href="#">{{ $item['title'] }}</a></h2>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach

        </div> --}}

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-md">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th></th>
                    </tr>
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                {{ $loop->index }}
                            </td>
                            <td>{{ $item['pageTitle'] }}</td>
                            <td>
                                <div wire:click="removeItem({{ $loop->index }})" class="article-badge-item bg-danger"
                                    style="cursor: pointer"><i class="fas fa-trash"></i> Delete</div>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>

    </div>
    <script>
        window.addEventListener('livewire:load', function() {
            $('.btn-popup').click(function() {
                console.log("test");
                var url = $(this).data('url');
                var title = $(this).data('title');


                $('#modal-title').html(title);
                $('#modal-iframe').attr('src', url);
                $('#articleModal').modal('show');
            });

            $("#modal-iframe").on('load', function() {

                $(this).contents().find('.btn-choice').click(function() {
                    var id = $(this).data('id');
                    console.log(id);
                    Livewire.emit('select', {
                        id: id
                    });
                    $('#articleModal').modal('hide');
                });

            });
        });

        window.addEventListener('swal:response', e => {
            Swal.fire({
                position: 'center',
                icon: e.detail.type,
                title: e.detail.title,
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
</div>
