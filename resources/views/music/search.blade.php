<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/theme.css') }}" >
</head>
<body>
<div class="flex-center position-ref full-height">

    @if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
        <a href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}">Register</a>
        @endif
        @endauth
    </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            {{$q}} | Search
        </div>

        <div class="links">
            <a href="/">Home</a>
            <a href="/artist/2pac">Artist</a>
            <a href="/song/123">Song</a>
            <a href="/station/108273">Station</a>
            <a href="/genre/123">Genre</a>
        </div>

        @foreach ($artist as $artist)
        <div>
            <label><a href="/station/{{$artist['station_id']}}">{{$artist['title']}} | {{$artist['artist']}}</a></label>
        </div>
        @endforeach


    </div>
</div>
</body>
</html>
