<div>
    @if ($layout != 'popup')
        <div class="section-header">
            <h1>Media</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Media</a></div>
            </div>
        </div>
    @endif
    <div class="section-body {{ $layout == 'popup' ? 'pl-4 pr-4' : '' }}">
        <div class="d-flex mb-4">
            <button type="button" class="btn-modal btn btn-icon icon-left btn-primary mt-3 mr-4"
                data-title="Tambah Media"><i class="fas fa-plus"></i>
                Add</button>
        </div>
        <div class="row">
            @foreach ($data as $item)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                    <article class="article article-style-b">
                        <div class="article-header">
                            <img src="{{ env('STORAGE') . '/storage/' . $item['path'] }}" class="article-image"
                                alt="{{ $item['title'] }}" srcset="">
                            @if ($layout != 'popup')
                                <div class="article-badge">
                                    <div wire:click="destroy({{ $item->id }})"
                                        class="article-badge-item bg-danger" style="cursor: pointer"><i
                                            class="fas fa-trash"></i> Delete</div>
                                </div>
                            @endif
                        </div>
                        <div class="article-details">
                            {{-- <div class="article-title">
                                <div class="text-truncate">{{ $item['photographer'] }}</div>
                                <div class="text-truncate">{{ $item['source'] }}</div>
                            </div> --}}
                            <p class="text-truncate">{{ $item['caption'] }}</p>
                            <div class="article-user">
                                <div class="article-user-details">
                                    <div class="user-detail-name">
                                        <a href="#">{{ $item['photographer'] }}</a>
                                    </div>
                                    <div class="text-job">{{ $item['source'] }}</div>
                                </div>
                            </div>
                            @if ($layout == 'popup')
                                <div class="article-cta">
                                    <button type="button"
                                        data-src="{{ env('STORAGE') . '/storage/' . $item['path'] }}"
                                        data-caption="{{ $item['caption'] }}"
                                        class="btn btn-picker btn-icon btn-success"><i
                                            class="fas fa-check"></i></button>
                                </div>
                            @endif
                        </div>
                    </article>
                </div>
            @endforeach

            {{-- <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                    <div class="article-header">
                        <div class="article-image" data-background="assets/img/news/img13.jpg"
                            style="background-image: url(&quot;assets/img/news/img13.jpg&quot;);">
                        </div>
                        <div class="article-badge">
                            <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> Trending</div>
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h2><a href="#">Excepteur sint occaecat cupidatat non proident</a></h2>
                        </div>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. </p>
                        <div class="article-cta">
                            <a href="#">Read More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </article>
            </div> --}}

        </div>
    </div>
    @push('script')
        <script src="{{ asset('assets/js/preview/jquery.uploadPreview.min.js') }}"></script>
    @endpush
    <script>
        window.addEventListener('livewire:load', function() {

            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "Choose File", // Default: Choose File
                label_selected: "Change File", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });

            $('.btn-modal').click(function() {
                // var url = $(this).data('url');
                var title = $(this).data('title');


                $('#modal-title').html(title);
                // $('#modal-iframe').attr('src', url);
                $('#addMedia').modal('show');
            });
        });

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
                    window.Livewire.emit('delete', {
                        id: e.detail.id
                    });
                }
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

    @push('view')
        <div class="modal fade" tabindex="-1" role="dialog" id="addMedia">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div id="image-preview" class="image-preview @error('image') is-invalid @enderror">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="col-form-label">Caption</label>
                                        <input type="text" class="form-control" name="caption" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Photographer</label>
                                        <input type="text" class="form-control" name="photographer">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Source</label>
                                        <input type="text" class="form-control" name="source">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endpush
</div>
