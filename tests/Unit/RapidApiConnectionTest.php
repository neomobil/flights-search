<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use Tests\TestCase;

class RapidApiConnectionTest extends TestCase
{
    /**
     * Test the connection to rapid api.
     *
     * @return void
     */
    public function testConnection(): void
    {
        $client = new Client([
            'base_uri' => config('rapidapi.url'),
            'timeout' => 2.0
        ]);

        $response = $client->request('GET', 'airports/search', [
            'headers' => [
                'x-rapidapi-host' => config('rapidapi.headers.x-rapidapi-host'),
                'x-rapidapi-key' => config('rapidapi.headers.x-rapidapi-key'),
            ],
            'query' => [
                'locale' => 'hu_HU',
                'query' => 'bud',
            ]
        ]);

        $statusCode = 200;
        $responseData = [
            [
                'code' => 'BUD',
                'country_code' => 'HU',
                'name' => 'Liszt Ferenc repülőtér',
                'city_name' => 'Budapest',
                'display_name' => 'Budapest, Magyarország – Liszt Ferenc repülőtér',
                'display_title' => 'Budapest, Magyarország',
                'display_sub_title' => 'Liszt Ferenc repülőtér',
                'location_id' => 274887,
                'time_zone_name' => 'Europe/Budapest',
                'latitude' => 47.433334,
                'longitude' => 19.233334
            ]
        ];
        $this->createMockResponse($responseData, $statusCode);
        $this->assertEquals($response->getBody()->getContents(), $responseData);
        $this->assertEquals($response->getStatusCode(), $statusCode);
    }
}
