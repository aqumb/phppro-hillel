<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\GameSolid\ParseApiInterface;
use App\GameSolid\DistanceCalculationInterface;
use App\GameSolid\FilterArrayInterface;
use App\GameSolid\SortDistanceInterface;
use App\GameSolid\ParseApi;
use App\GameSolid\DistanceCalculation;
use App\GameSolid\FilterArray;
use App\GameSolid\SortDistance;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ParseApiInterface::class, function ($app) {
            return new ParseApi('https://nominatim.openstreetmap.org/search.php?format=jsonv2&q=');
        });

        $this->app->bind(DistanceCalculationInterface::class, DistanceCalculation::class);

        $this->app->bind(FilterArrayInterface::class, FilterArray::class);

        $this->app->bind(SortDistanceInterface::class, SortDistance::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
