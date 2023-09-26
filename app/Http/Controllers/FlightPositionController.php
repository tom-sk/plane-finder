<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightPositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Flight $flight)
    {
        return response()->json([
            'position' => $flight->position,
            'location' => $flight->getFlightLocation(),
            'progress' => $flight->getFlightProgress(),
        ]);
    }


    public function update(PositionRequest $request)
    {
        $flight = Flight::find($request->id);

        if(count($flight->getPoints()) > $request->position){
            $flight->position = $request->position;
            $flight->save();
        }

        return response()->json([
            'position' => $flight->position,
            'location' => $flight->getFlightLocation(),
            'progress' => $flight->getFlightProgress(),
        ]);
    }
}
