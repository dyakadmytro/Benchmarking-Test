<?php

namespace Tests\Feature\Api;

use App\DTO\Weather;
use App\Facades\WeatherProvider;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testAuthenticatedUserCanAccessHomePage()
    {
        $ip = '127.0.0.1';
        $user = User::factory()->create();
        $this->actingAs($user);

        $weatherData = new Weather(25.5, 1010, 70, 20.3, 40.6);

        WeatherProvider::shouldReceive('getWeatherByIP')->with($ip)
            ->andReturn($weatherData);

        $response = $this->getJson(route('api.home'));

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'user' => [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                    ],
                    'main' => $weatherData->toArray(),
                ]
            ]);
    }
}
