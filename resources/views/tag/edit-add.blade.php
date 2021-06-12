@extends('layouts.app')
@section('body')
    <div class="section-header">
        <h1>{{ $action }} Tags</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('tag.index') }}">Tags</a></div>
            <div class="breadcrumb-item"><a href="#">{{ $action }} {{ Request::is('Tags') }}</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ $action == 'Add' ? route('tag.store') : route('tag.update', $content->id ?? '') }}" method="POST">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Name</label>
                                <div class="col-sm-12 col-md-7 col-lg-9">
                                    <input type="text" class="form-control" name="name" value="{{ $content->name ?? '' }}">
                                </div>
                            </div>
    
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Publish</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
