@extends('layouts.app')
@section('head')
<title>{{ $action }} Videos</title>
@show
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
@endpush
@section('body')
    <div class="section-header">
        <h1>{{ $action }} Videos</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('video.index') }}">Videos</a></div>
            <div class="breadcrumb-item"><a href="#">{{ $action }} {{ Request::is('videos') }}</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form
                        action="{{ $action == 'Add' ? route('video.store') : route('video.update', $content->id ?? '') }}"
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
                                    <textarea class="form-control" name="description"
                                        rows="10">{{ $content->description ?? '' }}</textarea>
                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="form-group">
                                    <label class="col-form-label">Video ID</label>
                                    <input type="text" class="form-control" name="vid"
                                        value="{{ $content->vid ?? '' }}">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Show</label>
                                    <select id="status" class="form-control selectric" name="status">
                                        <option value="1" @isset($content)
                                            {{ $content->status == 1 ? 'selected' : '' }} @endisset>True</option>
                                        <option value="0" @isset($content)
                                            {{ $content->status == 0 ? 'selected' : '' }} @endisset>False</option>

                                    </select>
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
