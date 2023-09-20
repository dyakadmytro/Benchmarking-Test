<?php

namespace App\Services;

use App\Contracts\IPProviderInterface;
use GuzzleHttp\Client;

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
        return $response->getBody()->getContents();
    }
}
