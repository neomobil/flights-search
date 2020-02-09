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
        $session = $this->create($request);
        return $this->flightsRepository->pollBySid($session->search_params->sid);
    }
    /**
     * @param  FlightsRequest  $request
     * @return StreamInterface
     */
    private function create(FlightsRequest $request): StreamInterface
    {
        return json_decode($this->flightsRepository->getSession($request->params));
    }
}
