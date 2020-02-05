<?php

namespace App\Providers;

use App\Repositories\AirportsRepository;
use App\Repositories\FlightsRepository;
use App\Repositories\Interfaces\AirportsRepositoryInterface;
use App\Repositories\Interfaces\FlightsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class FlightsServiceProvider extends ServiceProvider
{
    public $bindings = [
        AirportsRepositoryInterface::class => AirportsRepository::class,
        FlightsRepositoryInterface::class => FlightsRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
