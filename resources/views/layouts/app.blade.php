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
    <link href="{{ asset('css/additional.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" class="d-flex flex-column justify-content-center vh-100">       

        <div class="flex-grow-0">
            @include('layouts.navbar')
        </div>
        
        <div class="flex-grow-1  overflow-hidden">
            <main class="py-4 h-100">
                @yield('content')
            </main>
        </div>   

    </div>
</body>
</html>
