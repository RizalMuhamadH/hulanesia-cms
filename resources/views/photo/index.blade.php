@extends('layouts.app')
@section('body')
    <div class="section-header">
        <h1>Photos</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Photos</a></div>
        </div>
    </div>
    <div class="section-body">
        <livewire:datatable.photo-datatable />
    </div>
@endsection
