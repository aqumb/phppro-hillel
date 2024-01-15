<?php

namespace App\GameSolid;

interface DistanceCalculationInterface
{
    public function calculate(array &$places);

    public function setLat($lat);

    public function setLon($lon);
}
