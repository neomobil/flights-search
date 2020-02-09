<?php

namespace App\Repositories;

use App\Repositories\Interfaces\FlightsRepositoryInterface;
use GuzzleHttp\Client;
use Psr\Http\Message\StreamInterface;

class FlightsRepository implements FlightsRepositoryInterface
{

    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('rapidapi.url'),
            'timeout' => 2.0,
            'headers' => [
                'x-rapidapi-host' => config('rapidapi.headers.x-rapidapi-host'),
                'x-rapidapi-key' => config('rapidapi.headers.x-rapidapi-key'),
            ]
        ]);
    }

    /**
     * @inheritDoc
     */
    public function getSession(array $queryParams): StreamInterface
    {
        return $this->client->get('flights/create-session', [
            'query' => $queryParams
        ])->getBody();
    }

    /**
     * @inheritDoc
     */
    public function pollBySid(string $sid, string $currency = 'EUR', $ns = 'NON_STOP,ONE_STOP', $sort = 'PRICE')
    {
        return $this->client->get('flights/create-session', [
            'query' => [
                'sid' => $sid,
                'currency' => $currency,
                'ns' => $ns,
                'so' => $sort
            ]
        ])->getBody();
    }
}
