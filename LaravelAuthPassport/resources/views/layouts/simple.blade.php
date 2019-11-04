<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Infomuni</title>

        <meta name="description" content="Dashmix - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">


        @yield('css_before')
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700">
            <link rel="stylesheet" id="css-main" href="{{ asset('css/dashmix.css') }}">
            <link rel="stylesheet" id="css-theme" href="{{ asset('css/dashmix.css') }}">
        @yield('css_after')

        <!-- Scripts -->
<!--        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>-->

    </head>
    <body>

        <div id="page-container">
            <main id="main-container">
                @yield('content')
            </main>
        </div>

        <!-- Dashmix Core JS -->
        <script src="{{ asset('js/dashmix.app.js') }}"></script>

        <!-- Laravel Original JS -->
        <script src="{{ asset('js/laravel.app.js') }}"></script>
        @yield('js_after')

    </body>
</html>
