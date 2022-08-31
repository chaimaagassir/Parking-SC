<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Places ;
use App\Exports\PlaceExport;
use Excel;



class PlacesController extends Controller
{
    public function exportIntoExcelPlace()
    {
           return Excel::download(new PlaceExport,'placelist.xlsx');
    }

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

     //dd($request->typev); 
     //dd($request->couverte); 
     //dd($request->etat);     
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
     if($request->couverte && $request->etat)
     {
        
         $result = Places::where('couverte','LIKE','%' . $request->couverte . '%')
                         ->where('etat','LIKE','%' . $request->etat . '%')
                         ->get();
     }
     if($request->typev && $request->etat)
     {
        
         $result = Places::where('typev','LIKE','%' . $request->typev . '%')
                         ->where('etat','LIKE','%' . $request->etat . '%')
                         ->get();
     }
     if($request->typev && $request->etat && $request->couverte)
     {
        
         $result = Places::where('typev','LIKE','%' . $request->typev . '%')
                         ->where('etat','LIKE','%' . $request->etat . '%')
                         ->where('couverte','LIKE','%' . $request->couverte . '%')
                         ->get();
     }
    
   

     return view('layoutspp.searchplace' , compact('result')) 
    ;
   // return view('layoutspp.searchclient' , compact('client_filter','name','ville','cin','nb_v','etatcpt','result')) 
    //->with('i', $client_filter,$name,$ville,$cin,$nb_v,$etatcpt,$result);

   }
}
