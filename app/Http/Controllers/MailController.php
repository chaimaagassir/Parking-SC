<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from me',
            'body' => 'This is for testing mail'
        ];
        Mail::to("scparking2022@gmail.com")->send(new TestMail($details));
        return "Email Sent";
    }
    public function afficher()
    {
        $client= User::where('usertype', '=' , '0'); 
       
        return view('layoutspp.sendmail'); 
    }
}
