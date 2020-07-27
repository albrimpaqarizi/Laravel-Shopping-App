<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @include('pages.header')

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">

                        <div class="d-flex justify-content-center">
                            <div class="d-flex flex-column align-items-center">
                                <h3>Welcome to Laravel E-Commerce</h3>
                                <img src="{{ asset('storage/images/wp.jpg') }}" alt="img" class="img-responsive">
                            <a href="{{route('shop.index')}}"><button class="btn btn-primary mt-4">Shop Now</button></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>

        @include('pages.footer')
    </div>
</body>

</html>