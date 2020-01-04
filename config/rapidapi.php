<?php
return [
    'key' => env('RAPID_API_FLIGHTS_APP_TOKEN', ''),
    'protocol' => 'https://',
    'url' => config('rapidapi.protocol') . env('RAPID_API_FLIGHTS_APP_URL', ''),
    'headers' => [
        'x-rapidapi-host' => env('RAPID_API_FLIGHTS_APP_URL', ''),
        'x-rapidapi-key' => config('rapidapi.key'),
        'content-type' => 'application/x-www-form-urlencoded'
    ]
];
