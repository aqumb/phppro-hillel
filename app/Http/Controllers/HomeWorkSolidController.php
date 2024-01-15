<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameSolid\ParseApiInterface;
use App\GameSolid\DistanceCalculationInterface;
use App\GameSolid\FilterArrayInterface;
use App\GameSolid\SortDistanceInterface;

class HomeWorkSolidController extends Controller
{
    private $parseApi;
    private $distanceCalculation;
    private $filterArray;
    private $sortDistance;

    private $search = 'Продукти Одеса';
    private $excludePlaceIds = '';
    private $lat = 46.4774700;
    private $lon = 30.7326200;
    private $properties = ['place_id', 'name', 'display_name', 'distance'];

    public function __construct(
        ParseApiInterface $parseApi,
        DistanceCalculationInterface $distanceCalculation,
        FilterArrayInterface $filterArray,
        SortDistanceInterface $sortDistance
    )
    {
        $this->parseApi = $parseApi;
        $this->distanceCalculation = $distanceCalculation;
        $this->filterArray = $filterArray;
        $this->sortDistance = $sortDistance;
    }

    public function index(Request $request)
    {
        while (true) {
            $places = $this->parseApi->parse($this->search, $this->excludePlaceIds);

            $this->distanceCalculation->setLat($this->lat);
            $this->distanceCalculation->setLon($this->lon);
            $this->distanceCalculation->calculate($places);
            $this->sortDistance->sort($places);

            $filteredPlaces = $this->filterArray->setProperties($this->properties)->filter($places);

            if ($this->excludePlaceIds) {
                dd($filteredPlaces);
            }

            $this->excludePlaceIds = '&exclude_place_ids=' . urlencode(implode(',', array_keys($filteredPlaces)));
            dump($filteredPlaces);
        }
    }
}
