<?php

namespace App\Contracts;

interface WeatherProviderInterface
{
    public function getWeatherByCoordinates($lat, $lon): string;
}
