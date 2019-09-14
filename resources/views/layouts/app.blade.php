<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'White Cross Medical Clinic') }}</title>
        
        <div id="loadOverlay" style="background-color:#fff; position:absolute; top:0px; left:0px; width:100%; height:100%; z-index:2000;">
            <img src="{{ asset('img/loading_icon.svg') }}" style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);">
        </div>

        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="{{ asset('vendor/fontawesome/css/all.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @toastr_css
    </head>
    <body>
        <div id="app">
            @yield('content')
        </div>
        @include('layouts.include.scripts')
        @yield('script')
    </body>
    @toastr_render
</html>
