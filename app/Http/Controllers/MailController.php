<?php

namespace App\Http\Controllers;

use App\Mail\Contactus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request)
    {
        request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'msg' => 'required'

        ]);
        Mail::to("hello@carrent.com")->send(new Contactus($request));
        return back()->with('status', 'Message Sent!');
    }
}
