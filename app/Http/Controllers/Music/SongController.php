<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DarApi;
use Illuminate\Http\Request;

class SongController extends Controller
{

    public function __invoke($q)
    {
        $api        = new DarApi();

        $songs      = $api->getArtist($q);
        $songsArray = json_decode($songs);

        $stationRec      = $api->getArtistRecSongs($q);
        $stationArray = json_decode($stationRec);

        $songs2 = array();

        if (!empty($songsArray->station)) {
            if (is_array($songsArray->station)) {
                $songs      = $songsArray->station;
                $songsFinal = $songs;
            } else {
                $songs2[]   = $songsArray->station;
                $songsFinal = $songs2;
            }
        } else {
            $songsFinal = array();
        }

        return view('music.song',
            [
                'songs' => $songsFinal,
                'station' => $stationArray->station,
                'q' => $q
            ]
        );
    }
}
