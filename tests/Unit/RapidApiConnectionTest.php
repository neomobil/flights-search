<?php

namespace Tests\Unit;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;

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
            'base_uri' => 'https://skyscanner-skyscanner-flight-search-v1.p.rapidapi.com',
            'timeout' => 2.0
        ]);

        $response = $client->request('POST', 'apiservices/pricing/v1.0', [
            'headers' => [
                'x-rapidapi-host' => 'skyscanner-skyscanner-flight-search-v1.p.rapidapi.com',
                'x-rapidapi-key' => '37d7e959c3msh98258bc8da778a9p18db20jsn1dec28d9f473',
                'content-type' => 'application/x-www-form-urlencoded'
            ],
            'form_params' => [
                'inboundDate' => date('Y-m-d'),
                'cabinClass' => 'economy',
                'children' => 0,
                'infants' => 0,
                'country' => 'HU',
                'currency' => 'HUF',
                'locale' => 'hu-HU',
                'originPlace' => 'BUD-sky',
                'destinationPlace' => 'FUE-sky',
                'outboundDate' => date('Y-m-d', time() + (3600 * 24 * 7)),
                'adults' => 1
            ]
        ]);

        echo $response->getBody();
    }
}
