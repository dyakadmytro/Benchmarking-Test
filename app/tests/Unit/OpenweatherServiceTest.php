<?php

namespace Tests\Unit;

use App\Services\OpenweatherService;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;

class OpenweatherServiceTest extends TestCase
{
    public function testGetWeatherByCoordinatesSuccess()
    {
        $client = $this->createMock(Client::class);
        $response = new Response(
            200,
            ['Content-Type' => 'application/json'],
            '{"coord":{"lon":24.0297,"lat":49.8396},"weather":[{"id":802,"main":"Clouds","description":"scattered clouds","icon":"03n"}],"base":"stations","main":{"temp":288.85,"feels_like":288.33,"temp_min":288.85,"temp_max":288.85,"pressure":1015,"humidity":71,"sea_level":1015,"grnd_level":981},"visibility":10000,"wind":{"speed":3.44,"deg":168,"gust":6.78},"clouds":{"all":36},"dt":1695081596,"sys":{"country":"UA","sunrise":1695096303,"sunset":1695141049},"timezone":10800,"id":702550,"name":"Lviv","cod":200}'

        );
        $client->expects($this->once())
            ->method('get')
            ->willReturn($response);

        $apiKey = '123';
        $service = new OpenweatherService($client, $apiKey);
        $weatherData = $service->getWeatherByCoordinates(19.295590, 21.523920);

        $this->assertJson($weatherData);
    }

}
