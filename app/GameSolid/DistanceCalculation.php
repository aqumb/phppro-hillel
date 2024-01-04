<?php

namespace App\GameSolid;

class DistanceCalculation
{
    private $lat;
    private $lon;

    public function __construct($lat, $lon)
    {
        $this->lat = $lat;
        $this->lon = $lon;
    }

    public function calculate(&$places) : void
    {
        foreach ($places as $place) {
            $res = 2 * asin(sqrt(pow(sin(($this->lat - $place->lat) / 2), 2) + cos($this->lat) * cos($place->lat) * pow(sin(($this->lon - $place->lon) / 2), 2)));
            $place->distance = $res;
        }
    }
}
