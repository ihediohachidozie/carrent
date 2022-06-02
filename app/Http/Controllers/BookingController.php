<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Vehicle;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;


class BookingController extends Controller
{
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    public function book($id)
    {
        $bookings = Booking::where('vehicle_id', $id)->pluck('days');
        $booked_days = (json_encode($bookings));
        $vehicle  = Vehicle::find($id);

        return view('booking.book', compact('booked_days', 'vehicle'));
    }

    public function store(Request $request)
    {
        # code...
       // dd(request()->all());

        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'lastName' => 'required',
            'firstName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        try {

            $vehicle_cost = $request->amount;

            $days = [];
            $count = 0;

            $end = $request->end_date;
            $start = $request->start_date;


            $to = Carbon::createFromFormat('m/d/Y', $end);
            $from = Carbon::createFromFormat('m/d/Y', $start);

            $diff_in_days = $to->diffInDays($from);

            $msg = '';

            if ($to->lt($from)) {

                return redirect()->back()->withErrors([$msg => 'start date can not be less than end date']);
            } elseif ($diff_in_days == 0) {
                $diff_in_days = 1;


                $new = $from->addDays(0);

                array_push($days, $new->format("Y-m-d"));
            } else {

                array_push($days, $from->format("Y-m-d")); // start date

                for ($i = 1; $i <= $diff_in_days; $i++) {
                    $new = $from->addDays(1);

                    array_push($days, $new->format("Y-m-d"));
                }

                // check if date selected has been booked...
                $days_arr = [];

                for ($i = 0; $i < count($days); $i++) {


                    $check = DB::table('bookings')->where([['days', '=', $days[$i]], ['vehicle_id', '=', $request->vehicle_id]])->pluck('days');

                    if (count($check) > 0) {

                        if ($check[0] == $days[$i]) {

                            array_push($days_arr, $days[$i]);
                            $count++;
                        }
                    }
                }



                if ($count > 0) {
                    return redirect()->back()->withErrors([$msg => 'Sorry pick a new range or another vehicle because some dates within the selected range have been booked by another customer.!']);
                }
            }

            // get the dates

            $total = $vehicle_cost * $diff_in_days;  // get amount

            $amount = $total;  // amount for transaction table

            $total = $total . '00';


            $ref = Str::random();

            $url = "https://api.paystack.co/transaction/initialize";
            $fields = [
                'email' => request()->email,
                'amount' => $total,
                'reference' => $ref

            ];
            $fields_string = http_build_query($fields);
            //open connection
            $ch = curl_init();

            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer sk_test_b7e22212038805c27591c521ec343cca9eeb10f3",
                "Cache-Control: no-cache",
            ));

            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //execute post
            $result = curl_exec($ch);
            $link = json_decode($result);


            // store transaction


            $trans = Transaction::create([
                'amount' => $amount,
                'firstname' => $request->firstName,
                'lastname' => $request->lastName,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'reference' => $ref,
                'status' => 'pending',
                'month' => date('M'),
                'month_id' => date('m')
            ]);


            // store booking

            foreach ($days as $key => $value) {
                Booking::create([
                    'transaction_id' => $trans->id,
                    'vehicle_id' => $request->vehicle_id,
                    'days'  => $value,
                ]);
            }

            // paystack payment process
            return Redirect::to($link->data->authorization_url);

            //return Paystack::getAuthorizationUrl()->redirectNow();
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $msg = $resp = '';
        try {
            $paymentDetails = Paystack::getPaymentData();

            $paymentRef = ($paymentDetails['data']['reference']);
    
            $paymentStatus = $paymentDetails['data']['status'];
    
            if ($paymentStatus == 'success') {
    
                Transaction::where('reference', $paymentRef)
                    ->update(['status' => $paymentStatus]);
    
                $resp = 'Vehicle Booking completed. Thank you for your patronge!';
            } else {
    
                $currentTrans = Transaction::where('reference', $paymentRef)->get();
    
                Booking::where('transaction_id', $currentTrans->id)->delete();
                Transaction::find($currentTrans->id)->delete();
    
                $resp = 'Vehicle Booking failed. Please try again!';
            }
        } catch (\Throwable $th) {
            //throw $th;
            $resp = 'Vehicle Booking completed. Thank you for your patronge!';
        }

       
        return redirect('/')->withErrors([$msg => $resp]);;
    }
}
