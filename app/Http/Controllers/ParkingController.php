<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Parking ; 
use App\Models\Places ;
use App\Http\Requests\ParkingFormRequest;
use App\Exports\ParkingsExport;
use Excel;
class ParkingController extends Controller
{
    public function exportIntoExcel()
    {
           return Excel::download(new ParkingsExport,'parkinglist.xlsx');
    }
    public function exportIntoCSV()
    {
           return Excel::download(new ParkingsExport,'parkinglist.csv');
    }
    
    public function afficher()
    {
        $parking= Parking::paginate(5);
        return view('layoutspp.parking' , compact('parking')) 
        ->with('i',$parking);   
    }   
    public function afficherfind()
    {
        $parkingf= Parking::paginate(5);
        return view('client/layouts.findplace' , compact('parkingf')) 
        ->with('i',$parkingf);   
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
        

        for($i=0 ; $i<$data["nb_p_c_voiture"]; $i++) 
        {
            $place = new places ; 
            $place->id_parking=$parking->id ; 
            $place->save() ;
       
        }
        for($i=0 ; $i<$data["nb_p_nc_voiture"]; $i++) 
        {
            $place = new places ; 
            $place->id_parking=$parking->id ; 
            $place->couverte='0' ; 
            $place->save() ;
       
        }
        for($i=0 ; $i<$data["nb_p_c_moto"]; $i++) 
        {
            $place = new places ; 
            $place->id_parking=$parking->id ; 
            $place->typev='0';
            $place->save() ;
       
        }
        for($i=0 ; $i<$data["nb_p_nc_moto"]; $i++) 
        {
            $place = new places ; 
            $place->id_parking=$parking->id ;
            $place->typev='0';
            $place->couverte='0' ; 
            $place->save() ;
       
        }
      

       


        return redirect('parkings' )->with('message'  , 'Parking ajouté avec succés ! '  ) ;
   }
}
