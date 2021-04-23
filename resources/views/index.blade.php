<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <title>網站架設-期中作業</title>
</head>

<body>
    @include('nav')
    <div id="app">
        <a href="{{route('admin.index')}}">admin</a>
        {{-- <p>
            <router-link to="/admin">Go to Admin</router-link>
        </p>
        <router-view></router-view> --}}
    </div>
    <script src="{{asset('js/app.js')}}" defer></script>
</body>

</html>