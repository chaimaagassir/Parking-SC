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

    return redirect('places')->with('message','Place Deleted Successfully');
   }
   public function placeSearch(Request $request)
   {
    
     $typev = $_GET['typev'] ;
     $couverte = $_GET['couverte'] ;
     $etat = $_GET['etat'] ;
     
    

     if($request->typev)
     {
         $result = Places::where('typev','LIKE','%' . $request->typev . '%')->get();
     }
      if($request->couverte)
     {
         $result = Places::where('couverte','LIKE','%' . $request->couverte . '%')->get();
     }
    if($request->etat)
     {
         $result = Places::where('etat','LIKE','%' . $request->etat . '%')->get();
     }
     
    
     if($request->couverte && $request->typev)
     {
        
         $result = Places::where('couverte','LIKE','%' . $request->couverte . '%')
                         ->where('typev','LIKE','%' . $request->typev . '%')
                         ->get();
     }
     if($request->couverte && $request->cin)
     {
        
         $result = Places::where('couverte','LIKE','%' . $request->couverte . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->get();
     }
     if($request->typev && $request->cin)
     {
        
         $result = Places::where('typev','LIKE','%' . $request->typev . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->get();
     }
     if($request->typev && $request->cin && $request->couverte)
     {
        
         $result = Places::where('typev','LIKE','%' . $request->typev . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->where('couverte','LIKE','%' . $request->couverte . '%')
                         ->get();
     }
    
    

     
    

     return view('layoutspp.searchplace' , compact('result')) 
    ->with('i',$result);
   // return view('layoutspp.searchclient' , compact('client_filter','name','ville','cin','nb_v','etatcpt','result')) 
    //->with('i', $client_filter,$name,$ville,$cin,$nb_v,$etatcpt,$result);

   }
}
