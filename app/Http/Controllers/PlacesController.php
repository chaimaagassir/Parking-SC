<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Places ;


class PlacesController extends Controller
{

    public function afficher()
    {
        $places= Places::paginate(5);
         
        return view('layoutspp.places' , compact('places'))
        ->with('i',$places); ;   
    }   
}
