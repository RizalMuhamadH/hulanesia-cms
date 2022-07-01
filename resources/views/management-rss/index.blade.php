@extends('layouts.app')
@push('style')
@endpush
@section('body')
    <div class="section-header">
        <h1>Management Rss</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Management Rss</a></div>
        </div>
    </div>
    <div class="section-body">
        <livewire:datatable.management-rss-datatable />
    </div>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    @if (session('message'))
        <script>
            iziToast.success({
                title: '',
                message: "{{ session('message') }}",
                position: 'topRight'
            });
        </script>
    @endif


    <script>
        $('document').ready(function() {
            var clipboard = new ClipboardJS('.copy');

            clipboard.on('success', function(e) {
                iziToast.success({
                    title: '',
                    message: "Copied",
                    position: 'topRight'
                });
            });
        })
    </script>
@endpush
