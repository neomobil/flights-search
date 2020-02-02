<?php
return [
    'url' => 'https://' . env('RAPID_API_FLIGHTS_APP_URL', ''),
    'headers' => [
        'x-rapidapi-host' => env('RAPID_API_FLIGHTS_APP_URL', ''),
        'x-rapidapi-key' => env('RAPID_API_FLIGHTS_APP_TOKEN', '')
    ]
];
