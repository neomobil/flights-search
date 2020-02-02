<?php

namespace Tests\Unit;

use App\Repositories\AirportsRepository;
use Illuminate\Support\Collection;
use Tests\TestCase;

class AirportsRepositoryTest extends TestCase
{
    /**
     * Test the connection to rapid api.
     *
     * @return void
     */
    public function testRepo(): void
    {
        $airportsRepository = new AirportsRepository();
        $resp = $airportsRepository->get('bud');
        $this->assertInstanceOf(Collection::class, $resp);
    }
}
