<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected $apiKey = 'e007d0a4fe80f6b62cd7ee06e5bb5a69';

    public function getWeather($city)
    {
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $this->apiKey,
            'units' => 'metric'
        ]);

        return $response->json();
    }

    public function getAverageWeather($city)
    {
        $api1 = Http::get('API_URL_1', ['q' => $city])->json();
        $api2 = Http::get('API_URL_2', ['q' => $city])->json();

        return [
            'rain' => ($api1['rain']['1h'] + $api2['rain']['1h']) / 2,
            'uv_index' => ($api1['uv_index'] + $api2['uv_index']) / 2,
        ];
    }
}
