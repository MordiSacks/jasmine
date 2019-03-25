<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, shrink-to-fit=no, width=device-width">

    {{-- CSRF Token --}}
    <meta name="clue" content="{{ csrf_token() }}">

    <title>
        @yield('title')
        @if(View::hasSection('title'))|@endif
        {{ config('app.name', 'Jasmine') }}
    </title>

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">


    {{-- Scripts --}}
    <script src="{{ jMix('js/manifest.js', 'app') }}" defer></script>
    <script src="{{ jMix('js/vendor.js', 'app') }}" defer></script>
    <script src="{{ jMix('js/app.js', 'app') }}" defer></script>

    {{-- Styles --}}
    <link href="{{ jMix('css/vendor.css', 'app') }}" rel="stylesheet">
    <link href="{{ jMix('css/app.css', 'app') }}" rel="stylesheet">
</head>
<body></body>
</html>
