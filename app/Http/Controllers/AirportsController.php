<?php

namespace App\Http\Controllers;

use App\Http\Requests\AirportsRequest;
use App\Repositories\AirportsRepository;
use Illuminate\Support\Collection;

class AirportsController extends Controller
{
    protected $airportsRepository;

    public function __construct(AirportsRepository $airportsRepository)
    {
        $this->airportsRepository = $airportsRepository;
    }

    public function search(AirportsRequest $request): Collection
    {
        return $this->airportsRepository->get($request->search);
    }
}
