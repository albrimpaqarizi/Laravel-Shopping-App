<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="{{ asset('css/app-admin.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- plugin css -->
    <link href="{{ asset('assets/plugins/@mdi/font/css/materialdesignicons.min.css') }}" rel="stylesheet">
    <!-- end plugin css -->

</head>

<body>

    <div class="container-scroller" id="app">
        @include('dashboard.header')
        <div class="container-fluid page-body-wrapper">
            @include('dashboard.sidebar')
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container-fluid mb-5 pb-5">
                        @yield('content')
                    </div>
                </div>
                @include('dashboard.footer')
            </div>
        </div>
    </div>

    <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>

</body>

</html>