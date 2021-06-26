@extends('layouts.app')
@section('body')
    <div class="section-header">
        <h1>{{ $action }} Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('user.index') }}">Users</a></div>
            <div class="breadcrumb-item"><a href="#">{{ $action }} {{ Request::is('Users') }}</a></div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form
                            action="{{ $action == 'Add' ? route('user.store') : route('user.update', $content->id ?? '') }}"
                            method="POST">
                            @csrf
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Name</label>
                                <div class="col-sm-12 col-md-7 col-lg-9">
                                    <input type="text" class="form-control" name="name" value="{{ $content->name ?? '' }}"
                                        required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Email</label>
                                <div class="col-sm-12 col-md-7 col-lg-9">
                                    <input type="email" class="form-control" name="email"
                                        value="{{ $content->email ?? '' }}" required>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Roles</label>
                                <div class="col-sm-12 col-md-7 col-lg-9">
                                    <select class="form-control select2" multiple="" name="roles[]" required>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item }}" @isset($userRole)
                                                {{ $userRole->contains($item) ? 'selected' : '' }} @endisset>
                                                {{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Password</label>
                                <div class="col-sm-12 col-md-7 col-lg-9">
                                    <input type="password" class="form-control" name="password"
                                        {{ $action == 'Add' ? 'required' : '' }}>
                                </div>
                            </div>

                            @if ($action == 'Add')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-2">Password
                                        Confirmation</label>
                                    <div class="col-sm-12 col-md-7 col-lg-9">
                                        <input type="password" class="form-control" name="password_confirmation"
                                            {{ $action == 'Add' ? 'required' : '' }}>
                                    </div>
                                </div>
                            @endif

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
