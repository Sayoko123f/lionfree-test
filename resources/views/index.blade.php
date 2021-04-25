<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/test.css')}}" />
    <title>網站架設-期中作業</title>
</head>

<body>
    <div id="app">
        @include('nav')
        <div class="jumbotron jumbotron-fluid bg">
            {{-- <router-link to="/admin">Go to Admin</router-link> --}}
            <router-view></router-view>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}" defer></script>
</body>

</html>
{{-- <div id="app">
    <p>
    </p>
</div> --}}
{{-- http://jsfiddle.net/Kyle_/ZnfED/1/
https://stackoverflow.com/questions/4919076/outline-effect-to-text
https://stackoverflow.com/questions/57464935/font-outline-using-only-css
https://stackoverflow.com/questions/11679567/using-css-for-a-fade-in-effect-on-page-load --}}