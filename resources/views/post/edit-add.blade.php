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
                    <div class="card-body row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="col-form-label">Title</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Slug</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Summary</label>
                                <textarea rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Category</label>
                                <select id="category" class="form-control selectric">
                                    <option>Tech</option>
                                    <option>News</option>
                                    <option>Political</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Content</label>
                                <textarea id="tinymce" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Source</label>
                                    <input type="text" class="form-control" value="" name="source">
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Source Link</label>
                                    <input type="text" class="form-control" value="" name="source_link">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-form-label">Status</label>
                                <select id="status" class="form-control selectric" name="status">
                                    <option value="DRAFT">DRAFT</option>
                                    <option value="PUBLISH">PUBLISH</option>
                                    <option value="SCHEDULE">SCHEDULE</option>
                                </select>
                            </div>

                            <div class="form-group" id="publish">
                                <label class="col-form-label">Publish</label>
                                <input type="text" class="form-control datetimepicker">

                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Image</label>
                                <div id="image-preview" class="image-preview">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="image" id="image-upload" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Tags</label>
                                <select class="form-control select2" multiple="">
                                    <option>Option 1</option>
                                    <option>Option 2</option>
                                    <option>Option 3</option>
                                    <option>Option 4</option>
                                    <option>Option 5</option>
                                    <option>Option 6</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Meta
                                    Description</label>
                                <input type="text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Meta Keywords</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>



                        <div class="form-group row">
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
            if ($(this).val() == 'SCHEDULE') {
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
