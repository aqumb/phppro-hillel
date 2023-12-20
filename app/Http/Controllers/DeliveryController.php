<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryCalculator\DeliveryCalculator;

class DeliveryController extends Controller
{
    public function index()
    {
        $calculator = new DeliveryCalculator();
        $result1 = $calculator->calculatePrice(20, 30, 20, 30);
        $result2 = $calculator->calculatePrice(1, 35, 25, 35);
        $result3 = $calculator->calculatePrice(1.5, 8, 15, 25, 1500);

        var_dump($result1['price'], 'Метод: ', $result1['method']);
        var_dump($result2['price'], 'Метод: ', $result2['method']);
        var_dump($result3['price'], 'Метод: ', $result3['method']);
    }
}
