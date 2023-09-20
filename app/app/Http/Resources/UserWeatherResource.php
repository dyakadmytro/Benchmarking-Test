<?php

namespace App\Http\Resources;

use App\Enums\CacheTime;
use App\Facades\WeatherProvider;
use App\Services\UserWeatherService;
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
        $ip = $request->ip();

        $weatherData = Cache::remember("{$ip}-ip-weather", CacheTime::HOUR->value, function () use($ip) {
            return WeatherProvider::getWeatherByIP($ip);
        });

        return [
          'user' => [
              'id' => $this->id,
              'name' => $this->name,
              'email' => $this->email,
          ],
          'main' => $weatherData->toArray()
        ];
    }
}
