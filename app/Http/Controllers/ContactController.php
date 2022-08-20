<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail ;
use Illuminate\Http\Request;
use Mail ;

class ContactController extends Controller
{
    public function contact_us(){
        return view('client/layouts.contact');
    }
    public function send_mail(Request $request){
        $datalist=[
            "name"=> $request->name ,
            "message"=>$request->message, 
            "email"=>$request->email, 
            "subject"=>$request->subject, 
        ] ; 
        Mail::to('scparking2022@gmail.com')->send(new ContactMail($datalist)) ;
        return back()->with('message_sent' , 'Your message has ben sent successfully !') ; 

    }
}
