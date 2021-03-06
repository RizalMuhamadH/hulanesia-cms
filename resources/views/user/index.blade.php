@extends('layouts.app')
@section('head')
<title>Users</title>
@show
@push('style')
@endpush
@section('body')
    <div class="section-header">
        <h1>Users</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Users</a></div>
        </div>
    </div>
    <div class="section-body">
        <livewire:datatable.user-datatable />
    </div>
@endsection
@push('script')
@if (session('message'))
    <script>
        iziToast.success({
            title: '',
            message: "{{ session('message') }}",
            position: 'topRight' 
        });

    </script>
@endif
@endpush