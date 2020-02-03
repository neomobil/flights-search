<?php

namespace App\Repositories;

use Illuminate\Support\Collection;

class AirportsRepository implements AirportsRepositoryInterface
{

    private $client;
    /**
     * @inheritDoc
     * @return collection
     */
    public function get(string $string): Collection
    {
        return collect([]);
    }
}
