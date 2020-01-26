<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZRPD</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ asset('css/theme.css') }}" >

</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            GENRE
        </div>

        <div class="links">
            <a href="/">Home</a>
            <a href="/artist/2pac">Artist</a>
            <a href="/song/123">Song</a>
            <a href="/station/108273">Station</a>
            <a href="/genre/Rock">Genre</a>
        </div>

        <br><br>

        <div class="card" style="width: 36rem;">
            <div class="card-header">
                What's Popular Now
            </div>
            <ul class="list-group list-group-flush">
                @forelse($songs as $song)
                <li class="list-group-item"><a href="/station/{{$song['station_id']}}">{{$song['songtitle']}} {{$song['songartist']}}</a> | Station {{$song['callsign']}}| Time Remaining {{$song['playlist']['seconds_remaining']}}</li>
                @empty
                <li class="list-group-item">No Records</li>
                @endforelse
            </ul>
        </div>

    </div>
</div>
</body>
</html>
