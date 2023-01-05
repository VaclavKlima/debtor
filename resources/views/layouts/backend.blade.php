<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>{{ config('app.name') }} - @yield('title')</title>

    <meta name="description" content="@yield('description', trans('auth.descriptions', ['app_name' => config('app.name')]))">
    <meta name="author" content="Sorelio">
    <meta name="robots" content="noindex, nofollow">
    <meta name="api-token" content="{{ Auth::user()->api_token }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('media/favicons/coin512x512.png') }}">
    <link rel="icon" sizes="256x256" type="image/png" href="{{ asset('media/favicons/coin256x256.png') }}">
    <link rel="icon" sizes="128x128" type="image/png" href="{{ asset('media/favicons/coin128x128.png') }}">
    <link rel="icon" sizes="64x64" type="image/png" href="{{ asset('media/favicons/coin64x64.png') }}">
    <link rel="icon" sizes="32x32" type="image/png" href="{{ asset('media/favicons/coin32x32.png') }}">
    <link rel="icon" sizes="16x16" type="image/png" href="{{ asset('media/favicons/coin16x16.png') }}">
    <link rel="apple-touch-icon" sizes="128x128" href="{{ asset('media/favicons/coin128x128.png') }}">

    <!-- Modules -->
    @yield('css')
    <!-- Css -->
    <link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.min.css') }}">
    @livewireStyles
    @vite(['resources/sass/main.scss', ])
    @yield('css_after')

</head>
<body>
<div id="page-container" class="sidebar-o remember-theme enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">

    @include('layouts.backend.aside')

    @include('layouts.backend.sidebar')

    @include('layouts.backend.header')

    <main id="main-container">
        @yield('content')
    </main>

    @include('layouts.backend.footer')
</div>

<!-- Js -->
@yield('js')
@livewireScripts
<script src="{{ asset('js/lib/jquery.min.js') }}"></script>
<script src="{{ asset('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>

<script src="{{ asset('js/plugins/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
@vite([ 'resources/js/oneui/app.js', 'resources/js/app.ts'])
@yield('js_after')

</body>
</html>
