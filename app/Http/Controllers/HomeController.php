<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

  //  public static  $date = date('Y-m-d');
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

        $dailybookings = Booking::where('days', $date)->count();
       
        $ary = Transaction::select(DB::raw('sum(amount) as amount'), 'month')->groupBy('month')->orderBy('month_id', 'asc')->pluck('amount', 'month');

        $amount = [];
        $month = [];
         

         foreach($ary as $key => $value){
            array_push($month, $key);
            array_push($amount, $value);
         }
      
        $vehicles = Vehicle::all();
        return view('home', compact('vehicles', 'amount', 'month', 'dailybookings')); 
    }

    public function dailyBooking()
    {
        $date = date('Y-m-d');

        $dailybookings = Booking::with('transaction', 'vehicle')->where('days', $date)->get();
       
        return view('booking.dailybooking', compact('dailybookings'));

    }
}
