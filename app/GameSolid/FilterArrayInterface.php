<?php

namespace App\GameSolid;

interface FilterArrayInterface
{
    public function setProperties($properties): FilterArrayInterface;
    public function filter($places);
}
