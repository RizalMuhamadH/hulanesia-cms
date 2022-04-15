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
                                    <textarea rows="10" class="form-control" name="description">{{ $content->description ?? '' }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Category</label>
                                    <select id="category" class="form-control selectric" name="category_id" required>
                                        @foreach ($categories as $item)
                                            @if (count($item->children) != 0)
                                                <optgroup label="{{ $item->name }}">
                                                    @foreach ($item->children as $sub)
                                                        <option value="{{ $sub->id }}"
                                                            @isset($content) {{ $content->category_id == $sub->id ? 'selected' : '' }} @endisset>
                                                            {{ $sub->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @else
                                                <option value="{{ $item->id }}"
                                                    @isset($content) {{ $content->category_id == $item->id ? 'selected' : '' }} @endisset>
                                                    {{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Feature</label>
                                    <select id="feature" class="form-control selectric" name="feature_id" required>
                                        @foreach ($features as $item)
                                            <option value="{{ $item->id }}"
                                                @isset($content) {{ $content->feature_id == $item->id ? 'selected' : '' }} @endisset>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Related</label>
                                    <select id="select-posts" class="form-control select2" multiple="" name="related[]"
                                        required>
                                        @isset($content)
                                            @foreach ($content->related as $item)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->title }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                    <button type="button" class="btn-popup btn btn-icon icon-left btn-primary btn-sm mt-3"
                                        data-title="Related Posts"
                                        data-url="{{ route('post.index', ['layout' => 'popup']) }}"><i
                                            class="fas fa-plus"></i> Select Related Posts</button>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Content</label>
                                    <textarea id="tinymce" rows="10" class="form-control" name="body">{{ $content->body ?? '' }}</textarea>
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
                                @if (Auth::user()->hasRole('editor') || Auth::user()->hasRole('admin'))
                                    <div class="form-group">
                                        <label class="col-form-label">Author</label>
                                        <select id="author_id" class="form-control select2" name="author_id"
                                            value="{{ $content->author_id ?? '' }}" required>
                                            <option value="">Null</option>
                                            @foreach ($users as $item)
                                                <option value="{{ $item->id }}"
                                                    @isset($content) {{ $content->author_id == $item->id ? 'selected' : '' }} @endisset>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Status</label>
                                        <select id="status" class="form-control selectric" name="status"
                                            value="{{ $content->status->value ?? '' }}" required>
                                            <option value="DRAFT"
                                                @isset($content) {{ $content->status->value == 'DRAFT' ? 'selected' : '' }} @endisset>
                                                DRAFT</option>
                                            <option value="PUBLISH"
                                                @isset($content) {{ $content->status->value == 'PUBLISH' ? 'selected' : '' }} @endisset>
                                                PUBLISH
                                            </option>
                                            <option value="SCHEDULE"
                                                @isset($content) {{ $content->status->value == 'SCHEDULE' ? 'selected' : '' }} @endisset>
                                                SCHEDULE
                                            </option>
                                        </select>
                                    </div>
                                @endif

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
                                        <img src="{{ env('STORAGE') }}/storage/{{ $content->image->path }}"
                                            class="img-fluid" alt="" srcset="">
                                    </div>
                                @endisset

                                <div class="form-group">
                                    <label class="col-form-label">Caption</label>
                                    <textarea rows="10" class="form-control" name="caption">{{ $content->image->caption ?? '' }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Tags</label>
                                    <select id="select-tags" class="form-control select2" multiple="" name="tags[]"
                                        required>
                                        {{-- @foreach ($tags as $item)
                                            <option value="{{ $item->id }}" @isset($content)
                                                {{ $collection->contains($item->id) ? 'selected' : '' }} @endisset>
                                                {{ $item->name }}</option>
                                        @endforeach --}}
                                        @isset($content)
                                            @foreach ($content->tags as $item)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                    <button type="button" class="btn-popup btn btn-icon icon-left btn-primary btn-sm mt-3"
                                        data-title="Tambah/Edit Tag"
                                        data-url="{{ route('tag.index', ['layout' => 'popup']) }}"><i
                                            class="fas fa-plus"></i> Add/Edit Tag</button>
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
                                    <button type="submit" class="btn btn-primary">Publish</button>
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
    <script>
        $('document').ready(function() {

            $('.btn-popup').click(function() {
                var url = $(this).data('url');
                var title = $(this).data('title');


                $('#modal-title').html(title);
                $('#modal-iframe').attr('src', url);
                $('#articleModal').modal('show');
            });

            $("#select-tags").select2({
                minimumInputLength: 2,
                multiple: true,
                ajax: {
                    url: "{{ route('tag.search') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term,
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },

                },

            });

            $("#select-posts").select2({
                minimumInputLength: 3,
                multiple: true,
                ajax: {
                    url: "{{ route('post.search') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term,
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },

                },

            });

            $("#modal-iframe").on('load', function() {

                $.each($("#select-tags").val(), function(index, value) {
                    $("#modal-iframe").contents().find(".tag-" + value).attr('checked', true);
                });

                $.each($("#select-posts").val(), function(index, value) {
                    $("#modal-iframe").contents().find(".post-" + value).attr('checked', true);
                });

                $(this).contents().find('.btn-choice').click(function() {
                    var title = $(this).data('title');
                    var url = $(this).data('url');
                    tinymce.activeEditor.execCommand('mceInsertContent', false,
                        '<p><strong>Baca Juga: <a href="' + url + '">' + title +
                        '</a></strong></p>');
                    $('#articleModal').modal('hide');
                });

                $(this).contents().find('.check-box').click(function(e) {
                    var elm = window.parent.$($(this).data('elm'));
                    var name = $(this).data('name');
                    var id = $(this).data('id');

                    if (e.target.checked) {

                        var option = $('<option></option>').attr('selected', true).text(name).val(
                            id);
                        elm.append(option);
                        elm.trigger('change');
                    } else {
                        window.parent.$($(this).data('elm') + " option[value='" + id +
                            "']").remove();
                        elm.trigger('change');
                    }
                });

            });
        });
    </script>
@endpush
