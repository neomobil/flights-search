<?php

namespace App\Repositories;

use GuzzleHttp\Client;
use Psr\Http\Message\StreamInterface;

class AirportsRepository implements AirportsRepositoryInterface
{

    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('rapidapi.url'),
            'timeout' => 2.0
        ]);
    }

    /**
     * @inheritDoc
     */
    public function get(string $string, string $locale = 'en_EN'): StreamInterface
    {
        $response = $this->client->request('GET', 'airports/search', [
            'headers' => [
                'x-rapidapi-host' => config('rapidapi.headers.x-rapidapi-host'),
                'x-rapidapi-key' => config('rapidapi.headers.x-rapidapi-key'),
            ],
            'query' => [
                'locale' => $locale,
                'query' => $string,
            ]
        ]);
        return $response->getBody();
    }
}
