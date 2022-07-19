@extends('layouts.app')
@section('head')
<title>{{ $action }} Settings</title>
@show
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
@endpush
@section('body')
    <div class="section-header">
        <h1>{{ $action }} Settings</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('setting.index') }}">Settings</a></div>
            <div class="breadcrumb-item"><a href="#">{{ $action }} {{ Request::is('settings') }}</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ $action == 'Add' ? route('setting.store') : route('setting.update', $content->id ?? '') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body row">

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-form-label">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $content->name ?? '' }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Content</label>
                                    <textarea id="tinymce" rows="10" class="form-control"
                                        name="content">{{ $content->content ?? '' }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label class="col-form-label">SEO <Title></Title></label>
                                    <input type="text" class="form-control" name="seo_title"
                                        value="{{ $content->seo_title ?? '' }}">
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
@endpush
