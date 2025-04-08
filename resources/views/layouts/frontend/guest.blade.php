<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="{{ asset('favicon.png') }}">
        <link rel="stylesheet" href="{{ asset('lib/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
        <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
        <!-- Scripts -->
        @vite([
            'resources/css/app.css',
            'resources/js/app.js'
        ])
    </head>
    <body>
        @include('layouts.frontend.partial.navigation')

        <div class="container">
            {{ $slot }}
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    </body>
</html>
