@extends('layouts.app')
@push('style')
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-timepicker.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
@endpush
@section('body')
    <div class="section-header">
        <h1>{{ $action }} Posts</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/posts">Posts</a></div>
            <div class="breadcrumb-item"><a href="#">{{ $action }} {{ Request::is('posts') }}</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Title</label>
                            <div class="col-sm-12 col-md-7 col-lg-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Slug</label>
                            <div class="col-sm-12 col-md-7 col-lg-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Summary</label>
                            <div class="col-sm-12 col-md-7 col-lg-9">
                                <textarea rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Category</label>
                            <div class="col-sm-12 col-md-7 col-lg-9">
                                <select id="category" class="form-control selectric">
                                    <option>Tech</option>
                                    <option>News</option>
                                    <option>Political</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Content</label>
                            <div class="col-sm-12 col-md-7 col-lg-9">
                                <textarea id="tinymce" rows="10" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Status</label>
                            <div class="col-sm-12 col-md-7 col-lg-9">
                                <select id="status" class="form-control selectric">
                                    <option>DRAFT</option>
                                    <option>PUBLISH</option>
                                    <option>SCHEDULE</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4" id="publish">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Publish</label>
                            <div class="col-sm-12 col-md-7 col-lg-9">
                                <input type="text" class="form-control datetimepicker">
                            </div>
                            
                          </div>
                          
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Image</label>
                            <div class="col-sm-12 col-md-7 col-lg-9">
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="image" id="image-upload" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Meta Description</label>
                            <div class="col-sm-12 col-md-7 col-lg-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Meta Keywords</label>
                            <div class="col-sm-12 col-md-7 col-lg-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Publish</button>
                            </div>
                        </div>
                    </div>
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

        $('#publish').hide();
        $("#category").selectric();
        $('#status').selectric().on('change', function() {
            if($(this).val() == 'SCHEDULE'){
                $('#publish').show();
            } else {
                $('#publish').hide();
            }
            console.log($(this).val());
        });
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
