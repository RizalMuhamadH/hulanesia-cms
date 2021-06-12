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
@endsection
