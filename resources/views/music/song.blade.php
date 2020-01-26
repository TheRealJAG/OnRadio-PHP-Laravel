<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$q}} | Song</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/theme.css') }}" >
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            {{$q}} | Song
        </div>

        <div class="links">
            <a href="/">Home</a>
            <a href="/artist/2pac">Artist</a>
            <a href="/song/123">Song</a>
            <a href="/station/108273">Station</a>
            <a href="/genre/Rock">Genre</a>
        </div>

        <br>
        <ul class="list-group">
            @forelse($songs as $song)
            <li class="list-group-item"><a href="/station/{{$song->station_id}}">{{$song->title}}</a> | Station {{$song->callsign}}| Time Remaining {{$song->seconds_remaining}}</li>
            @empty
            <p>No Active Streams</p>
            @endforelse
        </ul>


    </div>
</div>

</body>
</html>
