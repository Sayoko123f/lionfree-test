<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" href="{{asset('css/test.css')}}" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.7.2/highlight.min.js"></script>
    <title>網站架設-期中作業</title>
</head>

<body>
    <div id="app">
        @include('nav')
        <div class="jumbotron jumbotron-fluid bg">
            <router-view></router-view>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>