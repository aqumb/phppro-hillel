<?php

namespace App\GameSolid;
use GuzzleHttp\Client as GuzzleClient;

class ParseApi
{
    private $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function parse($search, $excludePlaceIds) : mixed
    {
        $guzzleClient = new GuzzleClient();
        $response = $guzzleClient->request('GET', $this->url . urlencode($search) . $excludePlaceIds);
        return json_decode($response->getBody()->getContents());
    }
}
