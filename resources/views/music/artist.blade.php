<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$q}} | Artist</title>

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
            {{$q}} | Artist
        </div>

        <div class="links">
            <a href="/">Home</a>
            <a href="/artist/2pac">Artist</a>
            <a href="/song/123">Song</a>
            <a href="/station/108273">Station</a>
            <a href="/genre/Rock">Genre</a>
        </div>

        <br>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h5 class="mt-0">What's Playing Now <br>(Playlist Search)</h5>

                    <ul class="list-group">
                        @foreach ($artist as $artist)
                            <li class="list-group-item"><a href="/song/{{$artist['title']}}+{{$artist['artist']}}" target="_blank">{{$artist['title']}} | {{$artist['artist']}}</a></li>
                        @endforeach
                    </ul>

                </div>
                <div class="col-sm">
                    <h5 class="mt-0">What's Playing Now <br>(Rec Search - Artist Only Per API)</h5>

                    <ul class="list-group">
                        @foreach ($artistsRec as $artist2)
                            <li class="list-group-item"><a href="/song/{{$artist2['songtitle']}}+{{$artist2['songartist']}}" target="_blank">{{$artist2['songtitle']}} | {{$artist2['songartist']}}</a></li>
                        @endforeach
                    </ul>

                </div>
                <div class="col-sm">

                    <h5 class="mt-0">Popular Today <br>(list of all songs played by an artist on radio the last 24 hours. Results are sorted by popularity)</h5>

                    <ul class="list-group">
                        @foreach ($artistsAllSongs as $artist3)
                        <li class="list-group-item"><a href="/song/{{$artist3['title']}}+{{$artist3['artist']}}" target="_blank">{{$artist3['title']}} | {{$artist3['artist']}}</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>




    </div>
</div>
</body>
</html>
