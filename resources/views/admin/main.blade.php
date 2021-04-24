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
    <div id="app">
        @include('admin.nav')
        @include('admin.header')
        @yield('body')
        <router-view></router-view>

    </div>
    <script src="{{asset('js/app.js')}}" defer></script>
</body>

</html>