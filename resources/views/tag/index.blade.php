@extends('layouts.'.$layout ?? 'app')
@section('head')
<title>Tags</title>
@show
@section('body')
    <div class="section-header">
        <h1>Tags</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Tags</a></div>
        </div>
    </div>
    <div class="section-body">
        <livewire:datatable.tag-datatable :layout="$layout" />
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