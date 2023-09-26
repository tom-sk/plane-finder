<?php

namespace App\Http\Controllers;

use App\Models\Flight;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke()
    {
        return Flight::all();
    }

    public function show(Flight $flight)
    {
        return $flight;
    }
}
