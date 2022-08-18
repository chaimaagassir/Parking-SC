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
    public function delete_places($id)
   {
    $data=Places::find($id);
    $data->delete();

    return redirect('places')->with('succes','Data Deleted');
   }
}
