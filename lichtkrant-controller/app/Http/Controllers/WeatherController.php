<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

class WeatherController extends Controller
{
    public function store(Request $request)
    {
        $temperature = $request->input('temperature');
        $humidity = $request->input('humidity');


        $weather = Weather::find(1);        
        $weather->temperature = $temperature;
        $weather->humidity = $humidity;
        $weather->save();
      
        return response(200);
    }
}
