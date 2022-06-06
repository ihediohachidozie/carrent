<?php

use App\Models\Vehicle;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/booking/{id}/book', function($id){
    return Booking::find($id);
});
Route::post('/booking', [BookingController::class, 'store'])->name('store.transaction');
Route::get('/vehicles', function() {
    return Vehicle::all();
});

Route::get('/vehicles/{id}', function($id) {
    return Vehicle::find($id);
});

Route::get('/book/{id}', function($id) {
    $bookings = Booking::where('vehicle_id', $id);
    return $bookings->pluck('days');
});