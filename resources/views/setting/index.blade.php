@extends('layouts.app')
@section('head')
<title>Settings</title>
@show
@section('body')
    <div class="section-header">
        <h1>Settings</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Settings</a></div>
        </div>
    </div>
    <div class="section-body">
        <livewire:datatable.settings-datatable />
    </div>
@endsection
