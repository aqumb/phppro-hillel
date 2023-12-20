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

        echo "Result 1: " . print_r($result1, true) . "<br>";
        echo "Result 2: " . print_r($result2, true) . "<br>";
        echo "Result 3: " . print_r($result3, true) . "<br>";
    }
}
