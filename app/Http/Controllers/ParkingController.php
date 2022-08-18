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
        $parking_filter = Parking::distinct()->get(['ville']) ; // pour éviter les redondances des ville sur select
        return view('client/layouts.findplace' , compact('parkingf', 'parking_filter')) 
        ->with('i',$parkingf,$parking_filter);   
    } 
    public function parking_details($parking_id){
        $parking= Parking::where('id', '=' , $parking_id)->get(); 
       
        return view('client.layouts.parking-details' , compact('parking')) 
        ->with('i',$parking); 

    }
    public function parking_details_admin($parking_id){
        $parking= Parking::where('id', '=' , $parking_id)->get(); 
       
        return view('layoutspp.parkingdetails' , compact('parking')) 
        ->with('i',$parking); 

    }
    public function place_details_admin($parking_id){
        $parking= Parking::where('id', '=' , $parking_id)->get(); 
       
        return view('layoutspp.placedetails' , compact('parking')) 
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
        // if((isset($data["description"]))){
        //     $parking->description = $data["description"] ;
        // }
         $parking->description = isset($data["description"])? $data["description"] : null ; 
       
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


   // filter function in find place 
   public function filter_find_place(){
    $parking_filter = Parking::distinct()->get(['ville']) ; // pour éviter les redondances des ville sur select
    $ville=$_GET['ville'] ;
    $data = Parking::where('ville', 'LIKE', "%" . $ville . "%")->get();
    
    
    
    return view('client/layouts.searchparking' , compact('data','parking_filter')) 
    ->with('i',$data, $parking_filter); 
   }

   public function delete_parkings($id)
   {
    $data=Parking::find($id);
    $data->delete();

    return redirect('parkings')->with('message','Parking Deleted Successfully');
   }
}
