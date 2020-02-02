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
            'base_uri' => 'https://tripadvisor1.p.rapidapi.com',
            'timeout' => 2.0
        ]);

        $response = $client->request('GET', 'airports/search', [
            'headers' => [
                'x-rapidapi-host' => 'tripadvisor1.p.rapidapi.com',
                'x-rapidapi-key' => '8e4d26d262mshdf6691bc56fe473p160d71jsndf9eb3398f54',
            ],
            'query' => [
                'locale' => 'hu_HU',
                'query' => 'bud',
            ]
        ]);

        echo $response->getBody();

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
