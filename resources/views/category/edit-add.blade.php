@extends('layouts.app')
@section('body')
    <div class="section-header">
        <h1>{{ $action }} Categories</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('category.index') }}">Categories</a></div>
            <div class="breadcrumb-item"><a href="#">{{ $action }} {{ Request::is('categories') }}</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ $action == 'Add' ? route('category.store') : route('category.update', $content->id ?? '') }}" method="POST">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Name*</label>
                                <div class="col-sm-12 col-md-7 col-lg-9">
                                    <input type="text" class="form-control" name="name" value="{{ $content->name ?? '' }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Title</label>
                                <div class="col-sm-12 col-md-7 col-lg-9">
                                    <input type="text" class="form-control" name="title" value="{{ $content->title ?? '' }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Description</label>
                                <div class="col-sm-12 col-md-7 col-lg-9">
                                    <input type="text" class="form-control" name="description" value="{{ $content->description ?? '' }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Order</label>
                                <div class="col-sm-12 col-md-7 col-lg-9">
                                    <input type="number" class="form-control" name="order" value="{{ $content->order ?? '' }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Show</label>
                                <div class="col-sm-12 col-md-7 col-lg-9">
                                    <select id="present" class="form-control selectric" name="present">
                                        <option value="1" @isset($content)
                                        {{ $content->present == 1 ? 'selected' : '' }} @endisset>True</option>
                                        <option value="0" @isset($content)
                                        {{ $content->present == 0 ? 'selected' : '' }} @endisset>False</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Parent</label>
                                <div class="col-sm-12 col-md-7 col-lg-9">
                                    <select id="parent" class="form-control selectric" name="parent_id">
                                        <option value="0">Null</option>
                                        @foreach ($parents as $item)
                                            <option value="{{ $item->id }}" @isset($content)
                                                {{ $content->parent_id == $item->id ? 'selected' : '' }} @endisset>{{ $item->name }}</option>
                                        @endforeach

                                    </select>
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
