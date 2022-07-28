@extends('layouts.'.$layout ?? 'app')
@section('head')
<title>Posts</title>
@show
@section('body')
    <div class="section-header">
        <h1>Posts</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Posts</a></div>
        </div>
    </div>
    <div class="section-body">
        <livewire:datatable.posts-datatable :layout="$layout" :style="request()->style == null ? 'checkbox' : 'choice'" :status="request()->post ?? 'all' " />
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

@if (session('error'))
    <script>
        iziToast.error({
            title: 'Error',
            message: "{{ session('error') }}",
            position: 'topRight' 
        });

    </script>
@endif
@endpush