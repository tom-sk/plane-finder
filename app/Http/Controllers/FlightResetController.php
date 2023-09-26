<?php

namespace App\Http\Controllers;

use App\Models\Flight;

class FlightResetController extends Controller
{
    public function __invoke()
    {
        $flights = Flight::all();
        foreach ($flights as $flight) {
            $flight->position = 0;
            $flight->save();
        }
        return response()->json([
            'message' => 'Flights reset'
        ]);
    }

}
