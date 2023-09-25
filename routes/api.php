<?php

use App\Http\Controllers\FlightController;
use App\Http\Controllers\FlightPositionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/flights', FlightController::class)->name('flights.index');

Route::get('/flight-position/{flight}', FlightPositionController::class)->name('flight-position.index');
Route::post('/update-position', [FlightPositionController::class, 'update'])->name('flight-position.update');
Route::post('/reset-data', [FlightPositionController::class, 'resetFlights'])->name('flight-position.reset');

