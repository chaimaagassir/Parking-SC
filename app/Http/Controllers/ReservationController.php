<?php

namespace App\Http\Controllers;
use App\Models\Vehicules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function id_parking_form($id){
        $vehicules= Vehicules::where('id_client', '=' , Auth::user()->id)->get(); 
        return view('client/layouts.reserver' , compact('vehicules'))->with('i',$vehicules); 

    }
    

}
