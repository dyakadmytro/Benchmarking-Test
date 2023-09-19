<?php

namespace App\Services;

use App\Contracts\IPProviderInterface;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class IPAPIService implements IPProviderInterface
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
}
