<?php

namespace App\Context;

class Context
{
    private $objects;
    public function __construct(array $objects)
    {
        $this->objects = $objects;
    }

    public function formatData(Strategy $strategy): array
    {
        $formattedData = [];

        foreach ($this->objects as $object) {
            $formattedData[] = $strategy->formatObject((array)$object);
        }

        return $formattedData;
    }
}


