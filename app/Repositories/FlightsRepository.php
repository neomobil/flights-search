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
            'timeout' => 2.0
        ]);
    }

    /**
     * @inheritDoc
     */
    public function createSession(array $queryParams): StreamInterface
    {
        // TODO: Implement create() method.
    }

    /**
     * @inheritDoc
     */
    public function pollBySid(string $sid)
    {
        // TODO: Implement pollBySid() method.
    }
}
