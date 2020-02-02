<?php

namespace App\Providers;

use App\Repositories\AirportsRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\AirportsRepositoryInterface;

class FlightsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            AirportsRepositoryInterface::class,
            AirportsRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
