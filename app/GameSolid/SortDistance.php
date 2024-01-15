<?php

namespace App\GameSolid;

class SortDistance implements SortDistanceInterface
{
    public function sort(&$places) : void
    {
        usort($places, function ($a, $b) {
            return (isset($a['distance']) && isset($b['distance']) && $a['distance'] < $b['distance']) ? -1 : 1;
        });
    }
}
