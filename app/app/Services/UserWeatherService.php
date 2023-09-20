<?php

namespace App\Services;

use App\DTO\Weather;
use App\Facades\IPClient;
use App\Facades\WeatherClient;

class UserWeatherService
{
    public function getWeatherByIP(string $ip): Weather
    {
        $result = new Weather();
        $ipData = IPClient::getIPData($ip);
        $content = json_decode($ipData, true);
        if (isset($content['lat']) && isset($content['lon'])) {
            $weatherData = WeatherClient::setMetricUnits()->getWeatherByCoordinates($content['lat'], $content['lon']);
            $weather = json_decode($weatherData, true);
            $result->temp = $weather['main']['temp'];
            $result->pressure = $weather['main']['pressure'];
            $result->humidity = $weather['main']['humidity'];
            $result->temp_min = $weather['main']['temp_min'];
            $result->temp_max = $weather['main']['temp_max'];
        }
        return $result;
    }
}
