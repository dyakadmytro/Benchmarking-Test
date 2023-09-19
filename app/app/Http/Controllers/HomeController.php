<?php

namespace App\Http\Controllers;

use App\Facades\IPClient;
use App\Enums\CacheTime;
use App\Facades\WeatherClient;
use App\Facades\WeatherProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $ip = '188.163.73.242';

        $weatherData = Cache::remember("{$ip}-ip-weather", CacheTime::HOUR->value, function () use($ip) {
            return WeatherProvider::getWeatherByIP($ip);
        });

        return view('home', [
            'weatherData' => $weatherData,
        ]);
    }
}
