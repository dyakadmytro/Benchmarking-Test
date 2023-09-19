<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class WeatherClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'weather-client';
    }
}
