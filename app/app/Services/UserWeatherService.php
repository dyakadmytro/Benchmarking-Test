<?php

namespace App\Services;

use App\Facades\IPClient;
use App\Facades\WeatherClient;

class UserWeatherService
{
    public function getWeatherByIP(string $ip): array
    {
        $ipData = IPClient::getIPData($ip);
        $content = json_decode($ipData, true);
        $weatherData = WeatherClient::setMetricUnits()->getWeatherByCoordinates($content['lat'], $content['lon']);
        return json_decode($weatherData, true);
    }
}
