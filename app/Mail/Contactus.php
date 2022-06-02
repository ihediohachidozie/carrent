<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contactus extends Mailable
{
    use Queueable, SerializesModels;
    public $eamil, $name, $msg, $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        //
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->name = $this->request->firstName .' '. $this->request->lastName;
        $this->msg = $this->request->msg;
        $this->email = $this->request->email;
        //return $this->view('view.name');
        return $this->from($this->email)
        ->markdown('emails.contact', [
            'name' => $this->name,
            'msg' => $this->msg
        ]);
    }
}
