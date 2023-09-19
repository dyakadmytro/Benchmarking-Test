<?php

namespace App\Http\Controllers;

use App\Facades\IPAPI;
use App\Enums\CacheTime;
use App\Facades\Openweather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $ip = $request->ip();

        $coordinates = Cache::remember("{$ip}-ipCoordinates", CacheTime::HOUR->value, function () use($ip) {
            return IPAPI::getCoordinatesByIP($ip);
        });
        $weatherData = Cache::remember("{$ip}-weatherData", CacheTime::HOUR->value, function () use($coordinates) {
            return Openweather::getWeatherByCoordinates($coordinates['lat'], $coordinates['lon']);
        });

        return view('home', [
            'weatherData' => json_decode($weatherData, true),
        ]);
    }
}
