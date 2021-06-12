@extends('layouts.app')
@section('body')
    <div class="section-header">
        <h1>Categories</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Categories</a></div>
        </div>
    </div>
    <div class="section-body">
        <livewire:category-datatable />
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