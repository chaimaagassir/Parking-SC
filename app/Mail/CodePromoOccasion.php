<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CodePromoOccasion extends Mailable
{
    use Queueable, SerializesModels;
    public $datalist ;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datalist)
    {
        $this->datalist=$datalist ;
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
 
    public function build()
    {
        return $this->subject('Code Promo  !')->view('layoutspp.CodepromoOccasionMail');
    }
}
