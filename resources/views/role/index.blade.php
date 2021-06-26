@extends('layouts.app')
@push('style')
@endpush
@section('body')
    <div class="section-header">
        <h1>Roles</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Roles</a></div>
        </div>
    </div>
    <div class="section-body">
        <livewire:role-datatable />
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