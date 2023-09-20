<?php

namespace App\Services;

use App\Contracts\WeatherProviderInterface;
use GuzzleHttp\Client;

class OpenweatherService implements WeatherProviderInterface
{
    private $mode = 'json';
    private $units = 'standard';
    private $apiKey;
    private Client $client;
    private $languageSlugs = [
        'af', 'al', 'ar', 'az', 'bg', 'ca', 'cz', 'da', 'de', 'el', 'en', 'eu', 'fa', 'fi', 'fr', 'gl', 'he', 'hi', 'hr', 'hu',
        'id', 'it', 'ja', 'kr', 'la', 'lt', 'mk', 'no', 'nl', 'pl', 'pt', 'pt_br', 'ro', 'ru', 'sv', 'se', 'sk', 'sl', 'sp', 'es',
        'sr', 'th', 'tr', 'ua', 'uk', 'vi', 'zh_cn', 'zh_tw', 'zu',
    ];
    private $lang = 'en';


    public function __construct(Client $client, $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->client = $client;
    }

    public function getWeatherByCoordinates($lat, $lon): string
    {
        $params = http_build_query([
            'lat' => $lat,
            'lon' => $lon,
            'appid' => $this->apiKey,
            'mode' => $this->mode,
            'units' => $this->units,
            'lang' => $this->lang,
        ]);
        $url = "https://api.openweathermap.org/data/2.5/weather?{$params}";
        $response = $this->client->get($url);
        return $response->getBody()->getContents();
    }

    public function setModeJSON(): self
    {
        $this->mode = 'json';
        return $this;
    }

    public function setModeHTML(): self
    {
        $this->mode = 'html';
        return $this;
    }

    public function setModeXML(): self
    {
        $this->mode = 'xml';
        return $this;
    }

    public function setStandardUnits(): self
    {
        $this->units = 'standard';
        return $this;
    }

    public function setMetricUnits(): self
    {
        $this->units = 'metric';
        return $this;
    }

    public function setLang(string $lang): self
    {
        if (!in_array($lang, $this->languageSlugs)) throw new \Exception("You cant use this language in API");

        $this->lang = $lang;
        return $this;
    }
}
