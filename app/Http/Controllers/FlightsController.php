<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlightsRequest;
use App\Repositories\Interfaces\FlightsRepositoryInterface;
use Psr\Http\Message\StreamInterface;

class FlightsController extends Controller
{
    protected $flightsRepository;

    public function __construct(FlightsRepositoryInterface $flightsRepository)
    {
        $this->flightsRepository = $flightsRepository;
    }

    /**
     * @param  FlightsRequest  $request
     * @return StreamInterface
     */
    public function getTrip(FlightsRequest $request): StreamInterface
    {
        return $this->create($request);
    }
    /**
     * @param  FlightsRequest  $request
     * @return StreamInterface
     */
    private function create(FlightsRequest $request): StreamInterface
    {
        return $this->flightsRepository->getSession($request->params);
    }
}
