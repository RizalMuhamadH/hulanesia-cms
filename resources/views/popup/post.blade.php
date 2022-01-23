@extends('layouts.popup')
@section('body')
    <div class="section-header">
        <h1>Posts</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Posts</a></div>
        </div>
    </div>
    <div class="section-body">
        <livewire:modal.article-modal />
    </div>
@endsection
