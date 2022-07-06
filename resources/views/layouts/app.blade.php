<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    @yield('head')

    @isset($title)
        <title>{{ $title }}</title>
    @endisset
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    {{-- <link rel="stylesheet" href="{{ mix('assets/css/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/sweetalert2/dist/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/izitoast/iziToast.min.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/all.css') }}"> --}}

    @vite(['node_modules/selectric/public/selectric.css', 'node_modules/sweetalert2/dist/sweetalert2.min.css', 'node_modules/izitoast/dist/css/iziToast.min.css', 'node_modules/select2/dist/css/select2.min.css', 'node_modules/bootstrap-daterangepicker/daterangepicker.css', 'resources/css/style.css', 'resources/css/components.css', 'resources/css/app.css'])
    @stack('style')
    @livewireStyles


    {{-- <script src="{{ mix('/assets/js/tinymce/tinymce.min.js') }}"></script> --}}
    <script src="/assets/js/tinymce/tinymce.min.js"></script>
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    {{-- @vite('resources/js/app.js') --}}
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            @include('layouts.header')
            @include('layouts.sidebar')


            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('body')
                </section>
            </div>

            @stack('view')
            @include('section.modal')
            @include('layouts.footer')
        </div>
    </div>

    <!-- General JS Scripts -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    {{-- <script type="module" src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- @vite('node_modules/jquery/dist/jquery.slim.min.js') --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/selectric@1.13.0/public/jquery.selectric.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="{{ mix('assets/js/stisla.js') }}"></script> --}}

    <!-- JS Libraies -->

    <!-- Template JS File -->
    @vite(['resources/js/stisla.js', 'resources/js/scripts.js', 'resources/js/custom.js', 'node_modules/sweetalert2/dist/sweetalert2.min.js', 'node_modules/izitoast/dist/js/iziToast.min.js'])
    {{-- <script src="{{ mix('assets/js/scripts.js') }}"></script>
    <script src="{{ mix('assets/js/custom.js') }}"></script>
    <script src="{{ mix('assets/js/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="{{ mix('assets/js/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ mix('assets/js/izitoast/iziToast.min.js') }}"></script>
    <script src="{{ mix('assets/js/select2/select2.full.min.js') }}"></script>
    <script src="{{ mix('assets/js/moment/moment.js') }}"></script>
    <script src="{{ mix('assets/js/daterangepicker.js') }}"></script> --}}
    @stack('script')
    @livewireScripts
    <!-- Page Specific JS File -->
</body>

</html>
