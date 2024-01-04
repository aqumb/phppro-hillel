<?php

namespace App\GameSolid;

class SortDistance
{
    public function sort(&$places) : void
    {
        usort($places, function ($a, $b) {
            return ($a->distance < $b->distance) ? -1 : 1;
        });
    }
}
