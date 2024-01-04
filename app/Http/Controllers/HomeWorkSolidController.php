<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameSolid\ParseApi;
use App\GameSolid\DistanceCalculation;
use App\GameSolid\FilterArray;
use App\GameSolid\SortDistance;

class HomeWorkSolidController extends Controller
{
    private $url = 'https://nominatim.openstreetmap.org/search.php?format=jsonv2&q=';
    private $search = 'Продукти Одеса';
    private $exclude_place_ids = '';
    private $lat = 46.4774700;
    private $lon = 30.7326200;
    private $properties = ['place_id', 'name', 'display_name', 'distance'];

    public function index(Request $request) : void
    {
        while (true) {
            $parseApiService = new ParseApi($this->url);
            $places = $parseApiService->parse($this->search, $this->exclude_place_ids);

            $distanceCalculationService = new DistanceCalculation($this->lat, $this->lon);
            $distanceCalculationService->calculate($places);

            $sortByDistanceService = new SortDistance();
            $sortByDistanceService->sort($places);

            $filterOutputArrayService = new FilterArray($this->properties);
            $filteredPlaces = $filterOutputArrayService->filter($places);

            if ($this->exclude_place_ids) {
                dd($filteredPlaces);
            }

            $this->exclude_place_ids = '&exclude_place_ids=' . urlencode(implode(',', array_keys($filteredPlaces)));
            dump($filteredPlaces);
        }
    }
}
