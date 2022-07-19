@extends('layouts.app')
@section('head')
<title>{{ $action }} Management Rss</title>
@show
@section('body')
    <div class="section-header">
        <h1>{{ $action }} Management Rss</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('management-rss.index') }}">Management Rss</a></div>
            <div class="breadcrumb-item"><a href="#">{{ $action }} {{ Request::is('Management Rss') }}</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form
                        action="{{ $action == 'Add' ? route('management-rss.store') : route('management-rss.update', $content->id ?? '') }}"
                        method="{{ $action == 'Add' ? 'POST' : 'PATCH' }}">
                        @csrf
                        <div class="card-body row">

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label class="col-form-label">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ $content->name ?? '' }}">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Type</label>
                                    <select id="type" class="form-control selectric" name="type"
                                        value="{{ $content->type->value ?? '' }}" required>
                                        <option value="rss"
                                            @isset($content) {{ $content->type->value == 'rss' ? 'selected' : '' }} @endisset>
                                            RSS</option>
                                        <option value="atom"
                                            @isset($content) {{ $content->type->value == 'atom' ? 'selected' : '' }} @endisset>
                                            ATOM
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Format</label>
                                    <select id="format" class="form-control selectric" name="format"
                                        value="{{ $content->format ?? '' }}" required>
                                        <option value="standard"
                                            @isset($content) {{ $content->format == 'standard' ? 'selected' : '' }} @endisset>
                                            Standard</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">UTM</label>
                                    <input type="text" class="form-control" name="utm"
                                        value="{{ $content->utm ?? '' }}">
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-form-label">Category</label>
                                    <select id="category" class="form-control selectric" name="category_id" required>
                                        <option value="0"
                                            @isset($content) {{ $content->category_id == $item->id ? 'selected' : '' }} @endisset>
                                            All</option>
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
                                    <label class="col-form-label">Size</label>
                                    <input type="number" class="form-control" name="size"
                                        value="{{ $content->size ?? '' }}">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Status</label>
                                    <select id="status" class="form-control selectric" name="status"
                                        value="{{ $content->status ?? 0 }}" required>
                                        <option value="1"
                                            @isset($content) {{ $content->status == 1 ? 'selected' : '' }} @endisset>
                                            Active</option>
                                        <option value="atom"
                                            @isset($content) {{ $content->status == 0 ? 'selected' : '' }} @endisset>
                                            Inactive
                                        </option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
