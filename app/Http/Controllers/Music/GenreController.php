<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DarApi;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function __invoke($id)
    {
        $api = new DarApi();

        $songs     = $api->getTopSongs($id);
        $songsArray = json_decode($songs, true);


        return view('music.genre',
            [
                'songs' => array_slice($songsArray['song'],0,10)
            ]
        );
    }
}
