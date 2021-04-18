<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('head')
</head>

<body>
    @include('nav')
    @include('admin.nav')
    @yield('body')
    <script src="{{asset('js/app.js')}}" defer></script>
</body>

</html>