<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CurrencyExchange\CurrencyExchange;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $testClass = new CurrencyExchange;
        var_dump($testClass->setType('cash')->setCurrency("EUR")->execute());
        die();
    }
}
