@extends('layouts.app')
@section('head')
<title>Reports</title>
@show
@section('body')
    <div class="section-header">
        <h1>Reports</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Reports</a></div>
        </div>
    </div>
    <div class="section-body">
        <livewire:datatable.report-datatable>
    </div>
@endsection
