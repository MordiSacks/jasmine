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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    {{-- Scripts --}}
    <script src="{{ jMix('js/app.js', 'app') }}" defer></script>

    {{-- Styles --}}
    <link href="{{ jMix('css/app.css', 'app') }}" rel="stylesheet">
</head>
<body>
</body>
</html>
