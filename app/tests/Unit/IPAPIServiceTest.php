<?php

namespace Tests\Unit;

use App\Services\IPAPIService;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Tests\TestCase;

class IPAPIServiceTest extends TestCase
{
    public function testGetIPDataSuccess()
    {

        $client = $this->createMock(Client::class);
        $response = new Response(
            200,
            ['Content-Type' => 'application/json'],
            json_encode([
                'lat' => '49.8396',
                'lon' => '24.0297',
            ])
        );
        $client->expects($this->once())
            ->method('get')
            ->willReturn($response);
        $service = new IPAPIService($client);
        $ipData = $service->getIPData('127.0.0.1');
        $this->assertJson($ipData);
    }

}
