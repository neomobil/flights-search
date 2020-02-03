<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AirportsTest extends TestCase
{
    private $structure = [
        [
            'code',
            'country_code',
            'name',
            'city_name',
            'display_name',
            'display_title',
            'display_sub_title',
            'location_id',
            'time_zone_name',
            'latitude',
            'longitude',
        ]
    ];
    /**
     * @return void
     */
    public function testAirportsReturnsErrorIfNoParameterAdded(): void
    {
        $response = $this->get('api/airports?search=b');
        $response->assertStatus(302);
    }

    /**
     * @return void
     */
    public function testAirportsReturnsAtLeastOneEntry(): void
    {
        $response = $this->get('api/airports?search=bud');
        $response->assertStatus(200);
        $response->assertJsonStructure($this->structure);
    }
}
