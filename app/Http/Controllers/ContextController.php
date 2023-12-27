<?php

namespace App\Http\Controllers;

use App\Context\Context;
use App\Context\FirstStrategy;
use App\Context\SecondStrategy;

class ContextController extends Controller
{
    public function index()
    {
        $objects = [
            (object) [
                'brandName' => 'Ford',
                'model' => 'Mustang',
                'modelDetails' => 'GT rest 2',
                'modelYear' => 2014,
                'productionYear' => 2013,
                'color' => 'Oxford White',
            ],
            (object) [
                'brandName' => 'BMW',
                'model' => '520i',
                'modelDetails' => 'rest',
                'modelYear' => 2001,
                'productionYear' => 2001,
                'color' => 'Green',
            ],
            (object) [
                'brandName' => 'Hyundai',
                'model' => 'Sonata',
                'modelDetails' => 'rest',
                'modelYear' => 2014,
                'productionYear' => 2015,
                'color' => 'Gray',
            ],
            (object) [
                'brandName' => 'KIA',
                'model' => 'K5',
                'modelDetails' => 'rest',
                'modelYear' => 2019,
                'productionYear' => 2019,
                'color' => 'Black',
            ],
        ];

        $context = new Context($objects);

        $firstStrategy = new FirstStrategy();
        $resultFirstStrategy = $context->formatData($firstStrategy);

        $secondStrategy = new SecondStrategy();
        $resultSecondStrategy = $context->formatData($secondStrategy);

        echo '<pre>';
        var_dump($firstStrategyResult = $firstStrategy->formatResult($resultFirstStrategy, 'FirstStrategy'));
        var_dump($secondStrategyResult = $secondStrategy->formatResult($resultSecondStrategy, 'SecondStrategy'));
    }
}
