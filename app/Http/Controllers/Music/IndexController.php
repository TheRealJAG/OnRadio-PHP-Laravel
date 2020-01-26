<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DarApi;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function __invoke()
    {
        $api = new DarApi();

        $songs     = $api->getTopSongs();
        $songsArray = json_decode($songs, true);


        return view('welcome',
            [
                'songs' => array_slice($songsArray['song'],0,5)
            ]
        );
    }
}
