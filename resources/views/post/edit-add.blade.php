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
                    <form action="{{ $action == 'Add' ? route('post.store') : route('post.update', $content->id ?? '') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body row">

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-form-label">Title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $content->title ?? '' }}" required>
                                </div>
                                <!-- <div class="form-group">
                                                    <label class="col-form-label">Slug</label>
                                                    <input type="text" class="form-control">
                                                </div> -->
                                <div class="form-group">
                                    <label class="col-form-label">Summary</label>
                                    <textarea rows="10" class="form-control"
                                        name="description">{{ $content->description ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Category</label>
                                    <select id="category" class="form-control selectric" name="category_id" required>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}" @isset($content)
                                                {{ $content->category_id == $item->id ? 'selected' : '' }} @endisset>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Feature</label>
                                    <select id="feature" class="form-control selectric" name="feature_id" required>
                                        @foreach ($features as $item)
                                            <option value="{{ $item->id }}" @isset($content)
                                                {{ $content->feature_id == $item->id ? 'selected' : '' }} @endisset>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Content</label>
                                    <textarea id="tinymce" rows="10" class="form-control"
                                        name="body">{{ $content->body ?? '' }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Source</label>
                                        <input type="text" class="form-control" name="source"
                                            value="{{ $content->source ?? '' }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Source Link</label>
                                        <input type="text" class="form-control" name="source_link"
                                            value="{{ $content->source_link ?? '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Status</label>
                                    <select id="status" class="form-control selectric" name="status"
                                        value="{{ $content->status ?? '' }}" required>
                                        <option value="DRAFT" @isset($content)
                                            {{ $content->status == 'DRAFT' ? 'selected' : '' }} @endisset>DRAFT</option>
                                        <option value="PUBLISH" @isset($content)
                                            {{ $content->status == 'PUBLISH' ? 'selected' : '' }} @endisset>PUBLISH
                                        </option>
                                        <option value="SCHEDULE" @isset($content)
                                            {{ $content->status == 'SCHEDULE' ? 'selected' : '' }} @endisset>SCHEDULE
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group" id="publish">
                                    <label class="col-form-label">Publish</label>
                                    <input type="text" class="form-control datetimepicker" name="published_at"
                                        value="{{ $content->published_at ?? '' }}">

                                </div>

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
                                    @isset($content)
                                        @php
                                            $value = [];
                                            for ($i = 0; $i < count($content->tags); $i++) {
                                                $value[$i] = $content->tags[$i]->id;
                                            }
                                            $collection = collect($value);
                                            // $value = json_encode($value);
                                            // dd($collection);
                                        @endphp
                                    @endisset
                                    <label class="col-form-label">Tags</label>
                                    <select class="form-control select2" multiple="" name="tags[]" required>
                                        @foreach ($tags as $item)
                                            <option value="{{ $item->id }}" @isset($content)
                                                {{ $collection->contains($item->id ) ? 'selected' : '' }} @endisset>{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Meta
                                        Description</label>
                                    <input type="text" class="form-control" name="meta_description"
                                        value="{{ $content->meta_description ?? '' }}">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords"
                                        value="{{ $content->meta_keywords ?? '' }}">
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
