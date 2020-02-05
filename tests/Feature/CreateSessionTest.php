<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateSessionTest extends TestCase
{
    private $structure = [
        []
    ];
    /**
     * @return void
     */
    public function testAirportsReturnsErrorIfNoParameterAdded(): void
    {
        $response = $this->get('api/create-flight-session');
        $response->assertStatus(302);
    }

    /**
     * @return void
     */
    public function testAirportsReturnsAtLeastOneEntry(): void
    {
        $response = $this->get('api/create-flight-session');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->structure);
        $this->assertTrue(count($response->decodeResponseJson()) >= 1);
    }
}
