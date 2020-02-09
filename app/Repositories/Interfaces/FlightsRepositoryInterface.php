<?php
namespace App\Repositories\Interfaces;

interface FlightsRepositoryInterface
{

    /**
     * Create session for polling flights
     *
     * @param  array  $queryParams
     */
    public function getSession( array $queryParams);

    /**
     * Query api by sid
     * @param  string  $sid
     * @return mixed
     */
    public function pollBySid(string $sid);
}
