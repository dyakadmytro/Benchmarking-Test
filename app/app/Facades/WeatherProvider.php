<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class WeatherProvider extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'weather-provider';
    }
}
