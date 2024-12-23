<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Services\WeatherService;
use App\Notifications\WeatherAlert;
use Illuminate\Support\Facades\Notification;

class WeatherNotificationTest extends TestCase
{
    public function testWeatherNotification()
    {
        Notification::fake();

        $service = new WeatherService();
        $data = $service->getWeather('New York');

        $this->assertNotEmpty($data);

        Notification::assertNothingSent();
    }
}
