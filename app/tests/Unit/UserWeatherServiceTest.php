<?php

namespace Tests\Unit;

use App\DTO\Weather;
use App\Facades\IPClient;
use App\Facades\WeatherClient;
use App\Services\UserWeatherService;
use Tests\TestCase;

class UserWeatherServiceTest extends TestCase
{

    public function testGetWeatherByIPSuccess()
    {
        $ip = '127.0.0.1';
        IPClient::shouldReceive('getIPData')
            ->with($ip)
            ->andReturn(json_encode(['lat' => 49.8396, 'lon' => 24.0297]));

        WeatherClient::shouldReceive('setMetricUnits')
            ->andReturnSelf();

        WeatherClient::shouldReceive('getWeatherByCoordinates')
            ->with(49.8396, 24.0297)
            ->andReturn(json_encode([
                'main' => [
                    'temp' => 288.85,
                    'pressure' => 1015,
                    'humidity' => 71,
                    'temp_min' => 288.85,
                    'temp_max' => 288.85,
                ],
            ]));

        $weatherService = new UserWeatherService();

        $weather = $weatherService->getWeatherByIP($ip);

        $this->assertInstanceOf(Weather::class, $weather);
        $this->assertEquals(288.85, $weather->temp);
        $this->assertEquals(1015, $weather->pressure);
        $this->assertEquals(71, $weather->humidity);
        $this->assertEquals(288.85, $weather->temp_min);
        $this->assertEquals(288.85, $weather->temp_max);
    }
}
