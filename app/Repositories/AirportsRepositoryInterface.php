<?php
namespace App\Repositories;

interface AirportsRepositoryInterface
{

    /**
     * Get's airports by query string
     *
     * @param  string  $string
     */
    public function get( string $string);
}
