<?php

namespace App\GameSolid;

class DistanceCalculation implements DistanceCalculationInterface
{
    private $lat;
    private $lon;

    public function setLat($lat = null): void
    {
        $this->lat = $lat;
    }

    public function setLon($lon = null): void
    {
        $this->lon = $lon;
    }

    public function calculate(array &$places): void
    {
        foreach ($places as &$place) {
            $res = 2 * asin(sqrt(pow(sin(($this->lat - $place['lat']) / 2), 2) + cos($this->lat) * cos($place['lat']) * pow(sin(($this->lon - $place['lon']) / 2), 2)));
            $place['distance'] = $res;
        }
    }
}
