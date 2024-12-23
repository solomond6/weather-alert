<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\WeatherService;
use App\Notifications\WeatherAlert;

class WeatherController extends Controller
{
    public function notifyUsers()
    {
        $weatherService = new WeatherService();
        $users = User::all();

        foreach ($users as $user) {
            foreach ($user->cities as $city) {

                $weather = $weatherService->getWeather($city->name);

                if (isset($weather['rain']['1h']) > $user->rain_threshold) {
                    $user->notify(new WeatherAlert("Rain exceeds your threshold of {$user->rain_threshold}mm/h!"));
                }

                if (now()->lt($user->notifications_paused_until)) {
                    continue;
                }

                if (isset($weather['rain']['1h']) > 10) {
                    $user->notify(new WeatherAlert('Heavy rain expected!'));
                }

                if (isset($weather['uv_index']) > 8) {
                    $user->notify(new WeatherAlert('High UV levels detected!'));
                }
            }
        }
    }
}
