@extends('layouts.app')
{{-- @push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
@endpush --}}
@section('head')
<title>{{ $action }} Posts</title>
@show
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
                                    <label class="col-form-label">Title*</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ $content->title ?? old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- <div class="form-group">
                                                                                                                                                                                            <label class="col-form-label">Slug</label>
                                                                                                                                                                                            <input type="text" class="form-control">
                                                                                                                                                                                        </div> -->
                                <div class="form-group">
                                    <label class="col-form-label">Description*</label>
                                    <textarea rows="20" maxlength="255" class="description form-control @error('description') is-invalid @enderror"
                                        name="description">{{ $content->description ?? old('description') }}</textarea>
                                    <div id="info-count" class="valid-feedback">
                                        <span id="current">0</span><span id="maximum">/ 255</span>
                                    </div>
                                    @error('description')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Category*</label>
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

                                <div class="related form-group">
                                    <label class="col-form-label">Related</label>
                                    <select id="select-posts"
                                        class="form-control select2 @error('related') is-invalid @enderror" multiple=""
                                        name="related[]">
                                        @isset($content)
                                            @foreach ($content->related as $item)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->title }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                    @error('related')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <button type="button" class="btn-popup btn btn-icon icon-left btn-primary btn-sm mt-3"
                                        data-title="Related Posts"
                                        data-url="{{ route('post.index', ['layout' => 'popup']) }}"><i
                                            class="fas fa-plus"></i> Select Related Posts</button>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Content*</label>
                                    <textarea id="tinymce" rows="10" class="form-control" name="body">{{ $content->body ?? old('body') }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Source</label>
                                        <input type="text" class="form-control" name="source"
                                            value="{{ $content->source ?? old('source') }}">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Source Link</label>
                                        <input type="text" class="form-control" name="source_link"
                                            value="{{ $content->source_link ?? old('source') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                @if (Auth::user()->hasRole('editor') || Auth::user()->hasRole('admin'))
                                    <div class="form-group">
                                        <label class="col-form-label">Author*</label>
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
                                        <label class="col-form-label">Status*</label>
                                        <select id="status" class="form-control selectric" name="status"
                                            value="{{ $content->status->value ?? old('status') }}" required>
                                            <option value="DRAFT"
                                                @isset($content) {{ $content->status->value == 'DRAFT' ? 'selected' : '' }} @endisset>
                                                DRAFT</option>
                                            <option value="PUBLISH"
                                                @isset($content) {{ $content->status->value == 'PUBLISH' ? 'selected' : '' }} @endisset>
                                                PUBLISH
                                            </option>
                                            <option value="ARCHIVE"
                                                @isset($content) {{ $content->status->value == 'ARCHIVE' ? 'selected' : '' }} @endisset>
                                                ARCHIVE
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
                                    <label class="col-form-label">Image*</label>
                                    <div id="image-preview" class="image-preview @error('image') is-invalid @enderror">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" @required($action == 'Add' ? true : false) />
                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                @isset($content)
                                    <div class="form-group">
                                        <label class="col-form-label">Preview</label>
                                        <img src="{{ env('STORAGE') . $content->image->path }}"
                                            class="img-fluid" alt="" srcset="">
                                    </div>
                                @endisset

                                <div class="form-group">
                                    <label class="col-form-label">Caption*</label>
                                    <textarea rows="10" maxlength="255" class="caption form-control" name="caption">{{ $content->image->caption ?? old('caption') }}</textarea>
                                    <div id="info-count-caption" class="valid-feedback">
                                        <span id="current-caption">0</span><span id="maximum">/ 255</span>
                                    </div>
                                    @error('caption')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="tags form-group">
                                    <label class="col-form-label">Tags*(min 3)</label>
                                    <select id="select-tags"
                                        class="form-control select2 @error('tags') is-invalid @enderror"
                                        style="border-color: red" multiple="" name="tags[]" required>
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
                                    @error('tags')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <button type="button"
                                        class="btn-popup btn btn-icon icon-left btn-primary btn-sm mt-3"
                                        data-title="Tambah/Edit Tag"
                                        data-url="{{ route('tag.index', ['layout' => 'popup']) }}"><i
                                            class="fas fa-plus"></i> Add/Edit Tag</button>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Meta
                                        Description</label>
                                    <input type="text" class="form-control" name="meta_description"
                                        value="{{ $content->meta_description ?? old('meta_description') }}">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keywords"
                                        value="{{ $content->meta_keywords ?? old('meta_keywords') }}">
                                </div>
                            </div>



                            <div class="col-md-8">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2"></label>
                                <div class="buttons col-sm-12 col-md-7">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a class="btn btn-danger" href="{{ route('post.index') }}">Canncel</a>
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
    {{-- <script src="{{ asset('assets/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script> --}}
    <script src="{{ asset('assets/js/custom_tinymce.js') }}"></script>

    <script type="module">
        $('document').ready(function() {

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

                $(this).contents().find('.btn-picker').click(function() {
                    var caption = $(this).data('caption');
                    var src = $(this).data('src');
                    tinymce.activeEditor.execCommand('mceInsertContent', false,
                        '<p><img width="100%" src="' + src + '" alt="' + caption + '"' +
                        '/></p>');
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

            var count = {{ isset($content->description) ? strlen($content->description) : 0 }},
                maximum = 255,
                current = $('#current').text(count),
                textarea = $('.description');

            if (count == 0) {
                textarea.addClass('is-invalid')
                $('#info-count').addClass('invalid-feedback')
            } else {
                textarea.addClass(
                    count > (0.9 * maximum) ?
                    'is-invalid' : 'is-valid')
            }

            $('.description').keyup(function() {

                var characterCount = $(this).val().length,
                    infoCount = $('#info-count');

                current.text(characterCount);

                if (characterCount > (0.9 * maximum)) {
                    infoCount.removeClass('valid-feedback')
                    infoCount.addClass('invalid-feedback')
                    textarea.removeClass('is-valid')
                    textarea.addClass('is-invalid')
                } else if (characterCount == 0) {
                    infoCount.removeClass('valid-feedback')
                    infoCount.addClass('invalid-feedback')
                    textarea.removeClass('is-valid')
                    textarea.addClass('is-invalid')
                } else {
                    infoCount.removeClass('invalid-feedback')
                    infoCount.addClass('valid-feedback');
                    textarea.removeClass('is-invalid')
                    textarea.addClass('is-valid')
                }


            });

            var countCaption = {{ isset($content->image->caption) ? strlen($content->image->caption) : 0 }},
                maximumCaption = 255,
                currentCaption = $('#current-caption').text(count),
                textareaCaption = $('.caption');

            if (count == 0) {
                textareaCaption.addClass('is-invalid')
                $('#info-count-caption').addClass('invalid-feedback')
            } else {
                textareaCaption.addClass(
                    count > (0.9 * maximum) ?
                    'is-invalid' : 'is-valid')
            }

            $('.caption').keyup(function() {

                var characterCountCaption = $(this).val().length,
                    infoCountCaption = $('#info-count-caption');

                currentCaption.text(characterCountCaption);

                if (characterCountCaption > (0.9 * maximumCaption)) {
                    infoCountCaption.removeClass('valid-feedback')
                    infoCountCaption.addClass('invalid-feedback')
                    textareaCaption.removeClass('is-valid')
                    textareaCaption.addClass('is-invalid')
                } else if (characterCountCaption == 0) {
                    infoCountCaption.removeClass('valid-feedback')
                    infoCountCaption.addClass('invalid-feedback')
                    textareaCaption.removeClass('is-valid')
                    textareaCaption.addClass('is-invalid')
                } else {
                    infoCountCaption.removeClass('invalid-feedback')
                    infoCountCaption.addClass('valid-feedback');
                    textareaCaption.removeClass('is-invalid')
                    textareaCaption.addClass('is-valid')
                }


            });

        });
    </script>

    @error('tags')
        <script type="module">
            $('document').ready(function() {
                $('.tags .select2-selection.select2-selection--multiple').css('border-color', 'red')
            });
        </script>
    @enderror
@endpush
