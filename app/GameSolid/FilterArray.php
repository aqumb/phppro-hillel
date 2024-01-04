<?php

namespace App\GameSolid;

class FilterArray
{
    private $properties;

    public function __construct($properties)
    {
        $this->properties = $properties;
    }

    public function filter($places) : array
    {
        $filteredPlaces = [];
        foreach ($places as $key => $place) {
            foreach ($place as $prop => $val) {
                if (!in_array($prop, $this->properties)) {
                    unset($place->$prop);
                }
            }
            $filteredPlaces[$place->place_id] = $place;
        }
        return $filteredPlaces;
    }
}
