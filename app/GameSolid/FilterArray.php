<?php

namespace App\GameSolid;

class FilterArray implements FilterArrayInterface
{
    private $properties;

    public function __construct($properties = [])
    {
        $this->properties = $properties ?? [];
    }

    public function setProperties($properties): FilterArrayInterface
    {
        $this->properties = $properties ?? [];
        return $this;
    }

    public function filter($places): array
    {
        $filteredPlaces = [];
        foreach ($places as $key => $place) {
            $placeArray = (array) $place; // Приводим к массиву
            foreach ($placeArray as $prop => $val) {
                if (!in_array($prop, $this->properties)) {
                    unset($placeArray[$prop]);
                }
            }
            $filteredPlaces[$placeArray['place_id']] = $placeArray;
        }
        return $filteredPlaces;
    }
}
