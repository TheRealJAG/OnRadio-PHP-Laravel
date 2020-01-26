<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use App\Http\Helpers\DarApi;
use Illuminate\Http\Request;

class StationController extends Controller
{

    public function __invoke($q)
    {
        $api          = new DarApi();

        $station      = $api->getStation($q);
        $stationArray = json_decode($station, true);

        $stationNowOn      = $api->getStationNowOn($q);
        $stationNowOnArray = json_decode($stationNowOn, true);


        return view('music.station',
            [
                'station' => $stationArray,
                'q' => $q,
                'callsign' => $stationNowOnArray['station']['callsign'],
                'genre' => $stationNowOnArray['station']['genre'],
                'artist' => $stationNowOnArray['station']['artist'],
                'title' => $stationNowOnArray['station']['title']
            ]
        );
    }
}
