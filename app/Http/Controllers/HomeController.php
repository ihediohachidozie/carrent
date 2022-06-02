<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $date = date('Y-m-d');
        // dd($date);
        $dailybookings = Booking::where('days', $date)->count();
        $amount = Transaction::select(DB::raw('sum(amount) as amount'), 'month')->groupBy('month')->orderBy('month_id', 'asc')->pluck('amount');
        $month = Transaction::select(DB::raw('sum(amount) as amount'), 'month')->groupBy('month')->orderBy('month_id', 'asc')->pluck('month');
        // dd(json_encode($amount));
        $vehicles = Vehicle::all();
        return view('home', compact('vehicles', 'amount', 'month', 'dailybookings')); 
    }

    public function dailyBooking()
    {
        $date = date('Y-m-d');
        $dailybookings = Booking::where('days', $date)->get();
        //dd($dailybookings);
        return view('booking.dailybooking', compact('dailybookings'));

    }
}
