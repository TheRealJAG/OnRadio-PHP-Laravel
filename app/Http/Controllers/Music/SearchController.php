<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DarApi;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function __invoke($q)
    {
        $api = new DarApi();

        $artists     = $api->getArtist($q);
        $artistArray = json_decode($artists, true);

        return view('music.search',
            ['artist' => $artistArray['station'], 'q' => $q]);
    }
}
