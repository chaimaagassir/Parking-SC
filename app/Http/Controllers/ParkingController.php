<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking ; 
class ParkingController extends Controller
{
    public function afficher()
    {
        $parking= Parking::paginate(7);
        return view('layouts.parking' , compact('parking')) 
        ->with('i',$parking); 
    }
}
