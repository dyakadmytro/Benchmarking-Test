<?php

namespace App\Http\Resources;

use App\Enums\CacheTime;
use App\Facades\WeatherProvider;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

class UserWeatherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $ip = '24.48.0.1';

        $weatherData = Cache::remember("{$ip}-ip-weather", CacheTime::HOUR->value, function () use($ip) {
            return WeatherProvider::getWeatherByIP($ip);
        });

        return [
          'user' => [
              'id' => $this->id,
              'name' => $this->name,
              'email' => $this->email,
          ],
          'main' => [
              'temp' => $weatherData['main']['temp'],
              'pressure' => $weatherData['main']['pressure'],
              'humidity' => $weatherData['main']['humidity'],
              'temp_min' => $weatherData['main']['temp_min'],
              'temp_max' => $weatherData['main']['temp_max'],
          ]
        ];
    }
}
