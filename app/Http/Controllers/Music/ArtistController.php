<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DarApi;
use Illuminate\Http\Request;

class ArtistController extends Controller
{

    public function __invoke($q)
    {
        $api = new DarApi();

        $artists     = $api->getArtist($q);
        $artistArray = json_decode($artists, true);

        $artistsRec     = $api->getArtistRec($q);
        $artistsRecArray = json_decode($artistsRec, true);

        $artistsAllSongs     = $api->getArtistAllSongs($q);
        $artistsAllSongsArray = json_decode($artistsAllSongs, true);

        return view('music.artist',
            [
                'artist' => $artistArray['station'], 'q' => $q,
                'artistsRec' => array_slice($artistsRecArray['song'],0,5),
                'artistsAllSongs' => array_slice($artistsAllSongsArray['songmatch']['song'],0,5)
            ]
        );
    }
}
