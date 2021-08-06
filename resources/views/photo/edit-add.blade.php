@extends('layouts.app')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
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
                    <form action="{{ $action == 'Add' ? route('photo.store') : route('photo.update', $content->id ?? '') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body row">

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-form-label">Title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $content->title ?? '' }}" required>
                                </div>                                
                                <div class="form-group">
                                    <label class="col-form-label">Description</label>
                                    <textarea id="tinymce" rows="10" class="form-control"
                                        name="description">{{ $content->description ?? '' }}</textarea>
                                </div>                                
                            </div>

                            <div class="col-md-4">                                
                                

                                

                                <div class="form-group">
                                    <label class="col-form-label">Image</label>
                                    <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" />
                                    </div>
                                </div>

                                @isset($content)
                                    <div class="form-group">
                                        <label class="col-form-label">Preview</label>
                                        <img src="/storage/{{ $content->image->path }}" class="img-fluid" alt="" srcset="">
                                    </div>
                                @endisset

                                <div class="form-group">
                                    <label class="col-form-label">Caption</label>
                                    <textarea rows="10" class="form-control"
                                        name="caption">{{ $content->image->caption ?? '' }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Photographer</label>
                                    <input type="text" class="form-control" name="photographer"
                                        value="{{ $content->photographer ?? '' }}">
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Publish</button>
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
    <script src="{{ asset('assets/js/preview/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/custom_tinymce.js') }}"></script>
    <script>
        "use strict";

        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });
    </script>
@endpush
