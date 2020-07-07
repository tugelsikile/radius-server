<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    <script src="{{ asset('js/adminlte.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layouts.header')

        @include('layouts.sidebar')

        @yield('content')
    </div>

</body>
</html>
