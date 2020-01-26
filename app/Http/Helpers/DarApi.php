<?php

namespace App\Http\Helpers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class DarApi
{

    const API_DEBUG                = false;
    const API_TOKEN                = '2185266294';
    const API_URL_ARTIST           = 'http://api.dar.fm/playlist.php?web=1&page_size=5&q=';
    const API_URL_ARTIST_ALL_SONGS = 'http://api.dar.fm/allsongs.php?web=1&page_size=5&artist=';
    const API_URL_ARTIST_REC       = 'http://api.dar.fm/reco2.php?web=1&page_size=5&artist=';
    const API_URL_ARTIST_REC_SONG  = 'http://api.dar.fm/reco.php?web=1&page_size=5';
    const API_URL_GENRE            = 'http://api.dar.fm/playlist.php?web=1&q=';
    const API_URL_SEARCH           = 'http://api.dar.fm/playlist.php?web=1&q=';
    const API_URL_SONG             = 'http://api.dar.fm/playlist.php?web=1&q=';
    const API_URL_SONG_ART         = 'http://api.dar.fm/songart.php?artist=prince&title=1999&res=med&partner_token=1234567890';
    const API_URL_STATION          = 'http://api.dar.fm/uberstationurlxml.php?web=1&station_id=';
    const API_URL_STATION_NOW_ON   = 'http://api.dar.fm/playlist.php?station_id=';
    const API_URL_TOP_SONGS        = 'http://api.dar.fm/topsongs.php?web=1&q=';

    public function getArtist($q)
    {
        return $this->getData($q, self::API_URL_ARTIST);
    }

    public function getArtistAllSongs($q)
    {
        return $this->getData($q, self::API_URL_ARTIST_ALL_SONGS);
    }

    public function getArtistRec($q)
    {
        return $this->getData($q, self::API_URL_ARTIST_REC);
    }

    public function getArtistRecSongs($q)
    {
        return $this->getDataSong($q, self::API_URL_ARTIST_REC_SONG);
    }

    public function getData($q, $url, $qSwitch = 'q=')
    {
        $clientUrl = $url . $q . '&partner_token=' . self::API_TOKEN;

        $client   = new Client();
        $results  = $client->request('GET', $clientUrl);
        $results2 = str_replace("\n", '', $results->getBody());
        $xml      = simplexml_load_string($results2);

        if (self::API_DEBUG === true) {
            echo '<pre>';
            echo $clientUrl;
            print_r($xml);
            exit;
        }

        return json_encode($xml);
    }

    public function getDataSong($q, $url)
    {

        $array = explode('+', $q);

        $clientUrl = $url . '&songartist=' . $array[1] . '&songtitle=' . $array[0] . '&partner_token=' . self::API_TOKEN;

        $client   = new Client();
        $results  = $client->request('GET', $clientUrl);
        $results2 = str_replace("\n", '', $results->getBody());
        $xml      = simplexml_load_string($results2);

        return json_encode($xml);
    }

    public function getDataSongArt($url,$artist, $song)
    {

        $clientUrl = $url . '&artist=' . $artist . '&title=' . $song . '&partner_token=' . self::API_TOKEN;

        $client   = new Client();
        $results  = $client->request('GET', $clientUrl);
        $results2 = str_replace("\n", '', $results->getBody());
        $xml      = simplexml_load_string($results2);

        return json_encode($xml);
    }

    public function getGenre($q)
    {
        return $this->getData($q, self::API_URL_ARTIST);
    }

    public function getSearch($q)
    {
        return $this->getData($q, self::API_URL_SEARCH);
    }

    public function getSong($q)
    {
        return $this->getData($q, self::API_URL_SONG);
    }

    public function getSongArt($artist, $song)
    {
        return $this->getDataSongArt(self::API_URL_SONG_ART, $artist, $song);
    }

    public function getStation($q)
    {
        return $this->getData($q, self::API_URL_STATION);
    }

    public function getStationNowOn($q)
    {
        return $this->getData($q, self::API_URL_STATION_NOW_ON);
    }

    public function getTopSongs($q = 'Music')
    {
        return $this->getData($q, self::API_URL_TOP_SONGS);
    }
}
