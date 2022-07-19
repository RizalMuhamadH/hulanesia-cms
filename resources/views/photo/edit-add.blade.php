@extends('layouts.app')
@section('head')
<title>{{ $action }} Photos</title>
@show
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/filepond@4.30.4/dist/filepond.css">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css" rel="stylesheet" />
@endpush
@section('body')
    <div class="section-header">
        <h1>{{ $action }} Photos</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('photo.index') }}">Photos</a></div>
            <div class="breadcrumb-item"><a href="#">{{ $action }} {{ Request::is('photos') }}</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form
                        action="{{ $action == 'Add' ? route('photo.store') : route('photo.update', $content->id ?? '') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body row">

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-form-label">Title*</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $content->title ?? '' }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Description*</label>
                                    <textarea id="tinymce" rows="5" class="form-control" name="description">{{ $content->description ?? '' }}</textarea>
                                </div>


                                {{-- <livewire:form.photos-field :current="$content->images ?? []"> --}}

                                {{-- <div class="form-group">
                                    <label class="col-form-label">Images</label>
                                    <input type="file" class="form-control">
                                </div> --}}

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label class="col-form-label">Caption</label>
                                    <textarea rows="10" class="form-control" name="caption">{{ $content->images[0]->caption ?? '' }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Photographer</label>
                                    <input type="text" class="form-control" name="photographer"
                                        value="{{ $content->images[0]->photographer ?? '' }}">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Images*</label>
                                    <input type="file" name="images[]" required>
                                </div>


                            </div>



                            <div class="form-group row">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/custom_tinymce.js') }}"></script>

    <script src="https://unpkg.com/filepond-plugin-file-metadata/dist/filepond-plugin-file-metadata.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
    <script src="https://unpkg.com/filepond@4.30.4/dist/filepond.js"></script>

    <script>

        var photos = {!! json_encode($content->images ?? []) !!};
        var storage = "{{ env('STORAGE') }}";

        console.log(photos);

        var files = photos.map(element => {
            return {
                        source: storage+element.path,
                        options: {
                            type: 'local',
                            file: {
                                name: element.path.split(/(\\|\/)/g).pop(),
                                size: 0,
                                type: 'image/'+element.path.split(".").pop(),
                            },
                            metadata: {
                                poster: storage+element.path,
                            },
                        },
                    };
        });

        $(document).ready(function() {
            const inputElement = document.querySelector('input[type="file"]');

            FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginFilePoster,
                FilePondPluginFileMetadata);

            const pond = FilePond.create(inputElement, {
                allowMultiple: true,
                allowMultipleFileSelection: true,
                allowBrowse: true,
                allowFilePoster: true,
                allowFileTypeValidation: true,
                maxFiles: 5,
                maxFileSize: '2MB',
                allowFileTypeValidation: true,
                allowFileExtensions: ['image/*'],

                files: files,
            });

            FilePond.setOptions({
                server: {
                    url: '/upload/photo',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                },
            });
            // pond.on('addfile', function(file) {
            //     console.log('File added', $('.filepond--data input').length);
            //     // inputElement.name = pond.getFiles();
            //     // inputElement.value = pond.getFiles()[0].file;

            //     for (let i = 0; i < $('.filepond--data input').length; i++) {
            //         let file = $('.filepond--data input').eq(i);
            //         console.log(file.val());
            //     }
            // });

            // pond.on('removefile', function(file) {
            //     console.log('File removed', file);

            //     // inputElement.value = pond.getFiles();
            // });
        });
    </script>
@endpush
