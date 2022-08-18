<?php

namespace App\Http\Controllers;
use App\Models\Vehicules;
use App\Http\Requests\VehiculesRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VehiculesController extends Controller
 
{
    public function afficher()
    { 
        $vehicules= Vehicules::where('id_client', '=' , Auth::user()->id)->get(); 
        return view('client.layouts.vehicules' , compact('vehicules')) 
        ->with('i',$vehicules); 
    }

   public function add_vehicule(VehiculesRequest $request){
        $data = $request->validated();  
        
        $vehicules = new Vehicules ;  
        $vehicules->immatricule = $data["immatricule"] ; 
        $vehicules->type = $data["type"] ;
        $vehicules->id_client = Auth::user()->id ;
      
        $vehicules->save() ; 

        return redirect('vehicules')->with('message'  , 'Vehicle added Successfully ! ') ;
   } 
   public function update_vehicule(VehiculesRequest $request , $id){
    
    $vehicules =  Vehicules::find($id) ;  
    $vehicules->immatricule = $data["immatricule"] ; 
    $vehicules->type = $data["type"] ;
    $vehicules->id_client = Auth::user()->id ;
  
    $vehicules->update() ; 

    return redirect('vehicules')->with('message'  , 'Vehicle Updated Successfully! ') ;
} 
}
