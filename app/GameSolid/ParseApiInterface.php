<?php

namespace App\GameSolid;

interface ParseApiInterface
{
    public function parse($search, $excludePlaceIds);
}
