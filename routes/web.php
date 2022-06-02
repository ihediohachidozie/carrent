<?php

use App\Models\Vehicle;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $vehicles = Vehicle::where('status', 1)->get();
    return view('welcome', compact('vehicles'));
});

Route::get('/booking/{id}/book', [BookingController::class, 'book'])->name('book');
Route::post('/booking', [BookingController::class, 'store'])->name('store.transaction');

// Laravel 8 paystack
//Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');

Route::get('/payment/callback', [BookingController::class, 'handleGatewayCallback']);

Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicle.index');
Route::get('/vehicle/create', [VehicleController::class, 'create'])->name('vehicle.create');
Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicle.store');
Route::get('/vehicle/{vehicle}/edit', [VehicleController::class, 'edit'])->name('vehicle.edit');
Route::put('/vehicle/{vehicle}', [VehicleController::class, 'update'])->name('vehicle.update');

Route::get('/user-info', [UserProfileController::class, 'showUserProfile'])->name('user.profile');
Route::put('/user-info/{user}', [UserProfileController::class, 'changeName'])->name('user.name');
Route::put('/user-password/{user}', [UserProfileController::class, 'changePassword'])->name('user.password');

Route::get('/transactions', [TransactionController::class, 'index'])->name('transaction.index');
Route::get('/transaction/bookings/{transaction}', [TransactionController::class, 'show'])->name('transaction.show');

Route::get('/transaction/daily-bookings', [HomeController::class, 'dailyBooking'])->name('home.dailybookings');





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// pages
Route::view('about','pages/about')->name('aboutus');
Route::view('services','pages/services')->name('services');
Route::view('contact','pages/contact')->name('contact');
//Route::view('about','about')->name('aboutus');

// contact sending mail
Route::post('/contactus', [MailController::class, 'sendMail'])->name('sendmail');
