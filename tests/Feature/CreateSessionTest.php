<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateSessionTest extends TestCase
{

    /**
     * @return void
     */
    public function testAirportsReturnsErrorIfNoParameterAdded(): void
    {
        $response = $this->post('api/create-flight-session', []);
        $response->assertStatus(302);
    }

    /**
     * @return void
     */
    public function testAirportsReturnsAtLeastOneEntry(): void
    {
        $this->session =
            [
                'params' => [
                    'd1' => 'FUE',
                    'o1' => 'VIE',
                    'dd1' => date('Y-m-d')
                ]
            ];
        $response = $this->post('api/create-flight-session', $this->session);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'search_params' => [
                'sid'
            ]
        ]);
        $this->assertTrue(count($response->decodeResponseJson()) >= 1);
    }
}
