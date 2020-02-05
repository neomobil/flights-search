<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightsRequest;
use App\Repositories\FlightsRepositoryInterface;

class FlightsController extends Controller
{
    protected $flightsRepository;

    public function __construct(FlightsRepositoryInterface $flightsRepository)
    {
        $this->flightsRepository = $flightsRepository;
    }

    /**
     * @param  FlightsRequest  $request
     */
    public function search(FlightsRequest $request): void
    {
    }
}
