@extends('layouts.app')
@section('head')
    <title>Dashboard</title>
@endsection
@section('body')
    @parent
    <div class="section-header">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        </div>
    </div>
    <div class="selection-body card">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            {{ $user }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Posts</h4>
                        </div>
                        <div class="card-body">
                            {{ $post }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-tag"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Tags</h4>
                        </div>
                        <div class="card-body">
                            {{ $tag }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Categories</h4>
                        </div>
                        <div class="card-body">
                            {{ $category }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Latest Posts</h4>
                    <div class="card-header-action">
                        <a href="{{ route('post.index') }}" class="btn btn-primary">View All</a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Author</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latest as $item)
                                    <tr>
                                        <td>
                                            {{ $item->title }}
                                            <div class="table-links">
                                                in <a href="{{ route('post.edit', $item->id) }}">Web Development</a>
                                                <div class="bullet"></div>
                                                <a href="#">View</a>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $item->category->name }}
                                        </td>
                                        <td>
                                            {{ $item->status->value }}
                                        </td>
                                        <td>
                                            @if ($item->author)
                                                @if ($item->author->image)
                                                    {{-- <figure> --}}
                                                        <img src="{{ env('STORAGE').$item->author->image->thumbnail('small', 'path') }}"
                                                            class="avatar mr-2 avatar-sm">
                                                    {{-- </figure> --}}
                                                @else
                                                    {{-- <figure> --}}
                                                        <img src="https://ui-avatars.com/api/?name={{ $item->author->name }}&color=7F9CF5&background=EBF4FF"
                                                            class="avatar mr-2 avatar-sm">
                                                    {{-- </figure> --}}
                                                @endif
                                                {{-- {{ $item->author->name }} --}}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
