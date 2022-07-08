<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Parking ; 
use App\Http\Requests\ParkingFormRequest;
class ParkingController extends Controller
{
    public function afficher()
    {
        $parking= Parking::paginate(5);
        return view('layoutspp.parking' , compact('parking')) 
        ->with('i',$parking);   
    }   
    
    public function add(){
        return view('layoutspp.ajouter-parking');
    }
    
   public function add_place(ParkingFormRequest $request){
        $data = $request->validated(); 
        $parking = new parking ; 
        $parking->ville = $data["ville"] ;   
        $parking->emplacement = $data["emplacement"] ;
        $parking->numéro_téléphone = $data["tel"] ;
        $parking->nb_p_c_voiture = $data["nb_p_c_voiture"] ; 
        $parking->nb_p_nc_voiture = $data["nb_p_nc_voiture"] ;
        $parking->nb_p_c_moto = $data["nb_p_c_moto"] ;
        $parking->nb_p_nc_moto = $data["nb_p_nc_moto"] ; 
        $parking->prix = $data["prix"] ;
        $parking->description = $data["description"] ;
        if( $request->hasfile('image')){
            
            $file = $request->file('image') ;
            $extention = $file->getClientOriginalExtension() ; 
            $filename = time() . '.' . $extention ; 
            $file->move('uploads/parkings/', $filename); 
            $parking->image = $filename ; 
        }
        
        
        $parking->save() ; 

        return redirect('parkings')->with('message'  , 'Parking ajouté avec succés ! ') ;
   }
}
