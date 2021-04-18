<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" />
    <title>網站架設-期中作業</title>
</head>

<body>
    @include('nav')
    <h1>網站架設</h1>
    <h2>期中作業</h2>
    <a href="{{route('news.index')}}">Admin_News</a>
</body>

</html>