<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\WeatherService;
use App\Notifications\WeatherAlert;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateThresholds(Request $request)
    {
        $validated = $request->validate([
            'rain_threshold' => 'required|numeric|min:0',
            'uv_threshold' => 'required|numeric|min:0',
            'cities' => 'required|array|min:1',
            'cities.*' => 'string|max:255',
        ]);
        $user = auth()->user();
        $user->update([
            'rain_threshold' => $validated['rain_threshold'],
            'uv_threshold' => $validated['uv_threshold'],
            'cities' => $validated['cities'],
        ]);
        return back()->with('status', 'Weather thresholds updated successfully!');
    }
}
