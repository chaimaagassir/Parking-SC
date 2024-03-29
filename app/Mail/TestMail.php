<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $datalist;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datalist)
    {
        $this->datalist = $datalist;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Test Mail')->view('layoutspp.email')
                                          ->subject('A new contact email')
                                          ->from('scparking2022@gmail.com','System')
                                          ->with('data',$this->datalist);
    }
}
