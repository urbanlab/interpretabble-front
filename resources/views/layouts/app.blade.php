<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
    @yield('css')
</head>
<body>
    <div id="app">
        <nav>
            <div class="nav-wrapper">
                <a href="{{ url('/') }}" class="brand-logo">&nbsp{{ config('app.name', 'Laravel') }}</a>
            </div>
        </nav>
        @yield('content')
        <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
    </div>
    
</body>
</html>