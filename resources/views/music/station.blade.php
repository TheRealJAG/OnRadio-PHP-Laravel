<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/theme.css') }}" >

</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="top-right links">
        <a href="{{ url('/') }}">Home</a>
    </div>

    <div class="content">
        <div class="title m-b-md">
            {{$station['callsign']}} | Station
        </div>

        <div class="links">
            <a href="/">Home</a>
            <a href="/artist/2pac">Artist</a>
            <a href="/song/123">Song</a>
            <a href="/station/108273">Station</a>
            <a href="/genre/Rock">Genre</a>
        </div>

<br>
        <h1>Now Playing {{$artist}} - {{$title}}</h1>


        <audio controls autoplay><source src="{{$station['url']}}" type="audio/mp3">Your browser does not support the audio element.</audio>

        <div>
            <label><a href="{{$station['url']}}" target="_blank">{{$station['url']}}</a> {{$station['encoding']}} </label>
        </div>

    </div>
</div>
</body>
</html>
