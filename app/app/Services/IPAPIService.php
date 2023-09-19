<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class IPAPIService
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getIPData($userIpAddress): string
    {
        $url = "http://ip-api.com/json/{$userIpAddress}";
        $response = $this->client->get($url);
        if ($response->getStatusCode() !== 200) {
            Log::error('ip-api request failed', ['url' => $url]);
            throw new \Exception('ip-api request failed!');
        }
        return $response->getBody()->getContents();
    }

    public function getCoordinatesByIP($userIpAddress): array
    {
        $data = $this->getIPData($userIpAddress);
        $content = json_decode($data, true);
        return [
            'lat' => $content['lat'],
            'lon' => $content['lon'],
        ];
    }
}
