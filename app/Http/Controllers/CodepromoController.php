<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Codepromo;
use App\Http\Requests\CPFormRequest; 
use App\Models\Reservation;
use App\Models\User ;
use DB;
use App\Mail\CodePromoMail ;
use App\Mail\CodePromoOccasion ;
use Mail ;
use Carbon\Carbon ; 

class CodepromoController extends Controller
{
    public function afficher()
    {
        $codespromo= Codepromo::paginate(7);
        $codepromos_filter = Codepromo::distinct()->get(['Nom']) ;
        return view('layoutspp.codespromo' , compact('codespromo','codepromos_filter')) 
        ->with('i',$codespromo,$codepromos_filter); 
    }

    public function add(){
        return view('layoutspp.ajouter-codepromo');
    }

   public function promocodes(CPFormRequest $request){
        $data = $request->validated();   
        $codespromo = new Codepromo ;  
        $codespromo->Nom = $data["Nom"] ; 
        $codespromo->Code = $data["Code"] ;
        $codespromo->Pourcentage = $data["Pourcentage"] ;
        $codespromo->nb_reserv = $data["nb_reserv"] ;
        $codespromo->Occasion = $data["Occasion"] ;
        $codespromo->date_expiration = $request["date_expiration"] ;
        

         $client = User::where('usertype', '=' , '0')->get();

           // codes promo d'occasaion 

         if( ! is_null($codespromo->Occasion)){
         
              foreach ($client as $c) {
            
                    $datalist=[
                        "Nom"=> $codespromo->Nom  ,
                        "Code"=> $codespromo->Code , 
                        "Occasion"=>$codespromo->Occasion , 
                        "Pourcentage"=>$codespromo->Pourcentage ,
                        "date_expiration"=>$codespromo->date_expiration, 
                        "name_client"=>$c->name 
                    ] ; 
                    Mail::to($c->email)->send(new CodePromoOccasion($datalist)) ;
            }
            return redirect('codespromo')->with('message'  , 'Code promo envoyé à tout les clients avec succés ! ') ;
        }

        if( ! is_null($codespromo->nb_reserv)){
        
            foreach ($client as $cp) {
                
                $count_reserv_client=Reservation::where('id_client' , '=' , $cp->id)->count() ; 
        
                if($codespromo->nb_reserv == $count_reserv_client){
                    $datalist=[
                        "Nom"=> $codespromo->Nom ,
                        "Code"=>$codespromo->Code, 
                        "Pourcentage"=>$codespromo->Pourcentage, 
                        "nb_reserv"=>$codespromo->nb_reserv, 
                        "date_expiration"=>$codespromo->date_expiration, 
                        "name_client"=>$cp->name 
                    ] ; 
                    Mail::to($cp->email)->send(new CodePromoMail($datalist)) ;
                    return redirect('codespromo')->with('message'  , 'Code promo de fidélité envoyé à tout les clients qu\'ils le méritent ! ') ;
                }
                
                 else {
                    return redirect('codespromo')->with('message'  , 'Code promo ajouté avec succés !  ') ;
                 }   
                
                }      
                
        }
        $codespromo->save() ; 
        
    
   }   

   public function delete_codepromos($id)
   {
    $data=Codepromo::find($id);
    $data->delete();

    return redirect('codespromo')->with('message','Promo code  Deleted Successfully');
   }

   public function edit_code($id)
   {
       $codepromos = DB::select('select * from codepromos where id = ?',[$id]);
       return view('layoutspp.modifier-codespromo',['codepromos'=>$codepromos]);
   }
   public function update_code(Request $request,$id)
   {
    $codepromos = Codepromo::find($id);

    $codepromos->Nom=$request->Nom;
    $codepromos->Code=$request->Code;
    $codepromos->Pourcentage=$request->Pourcentage;
    $codepromos->nb_reserv=$request->nb_reserv;
    $codepromos->Occasion =$request->Occasion ;
    $codepromos->date_expiration = $request->date_expiration ;
    $codepromos->save();
    $client = User::where('usertype', '=' , '0')->get();

           // codes promo d'occasaion 

         if( ! is_null($codepromos->Occasion)){
         
              foreach ($client as $c) {
            
                    $datalist=[
                        "Nom"=> $codepromos->Nom  ,
                        "Code"=> $codepromos->Code , 
                        "Occasion"=>$codepromos->Occasion , 
                        "Pourcentage"=>$codepromos->Pourcentage ,
                        "date_expiration"=>$codepromos->date_expiration, 
                        "name_client"=>$c->name 
                    ] ; 
                    Mail::to($c->email)->send(new CodePromoOccasion($datalist)) ;
            }
            return redirect('codespromo')->with('message'  , 'Code promo modifié et envoyé à tout les clients avec succés ! ') ;
        }

        if( ! is_null($codepromos->nb_reserv)){
        
            foreach ($client as $cp) {
                
                $count_reserv_client=Reservation::where('id_client' , '=' , $cp->id)->count() ; 
        
                if($codepromos->nb_reserv == $count_reserv_client){
                    $datalist=[
                        "Nom"=> $codepromos->Nom ,
                        "Code"=>$codepromos->Code, 
                        "Pourcentage"=>$codepromos->Pourcentage, 
                        "nb_reserv"=>$codepromos->nb_reserv, 
                        "date_expiration"=>$codepromos->date_expiration, 
                        "name_client"=>$cp->name 
                    ] ; 
                    Mail::to($cp->email)->send(new CodePromoMail($datalist)) ;
                    return redirect('codespromo')->with('message'  , 'Code promo de fidélité modifié et envoyé à tout les clients qu\'ils le méritent ! ') ;
                }
                
                 else {
                    return redirect('codespromo')->with('message'  , 'Code promo modifié avec succés !  ') ;
                 }   
                
                }      
                
        }
       
        
   

 
   }
   public function codepromoSearch(Request $request)
   {
     $codepromos_filter = Codepromo::distinct()->get(['Nom']) ; 
     $Nom = $_GET['Nom'] ;
     $Code = $_GET['Code'] ;
     $Pourcentage = $_GET['Pourcentage'] ;
     
    

     if($request->Code)
     {
         $result = Codepromo::where('Code','LIKE','%' . $request->Code . '%')->get();
     }
      if($request->Nom)
     {
         $result = Codepromo::where('Nom','LIKE','%' . $request->Nom . '%')->get();
     }
    if($request->Pourcentage)
     {
         $result = Codepromo::where('Pourcentage','LIKE','%' . $request->Pourcentage . '%')->get();
     }
     
    
     if($request->Nom && $request->Code)
     {
        
         $result = Codepromo::where('Nom','LIKE','%' . $request->Nom . '%')
                         ->where('Code','LIKE','%' . $request->Code . '%')
                         ->get();
     }
     if($request->Nom && $request->cin)
     {
        
         $result = Codepromo::where('Nom','LIKE','%' . $request->Nom . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->get();
     }
     if($request->Code && $request->cin)
     {
        
         $result = Codepromo::where('Code','LIKE','%' . $request->Code . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->get();
     }
     if($request->Code && $request->cin && $request->Nom)
     {
        
         $result = Codepromo::where('Code','LIKE','%' . $request->Code . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->where('Nom','LIKE','%' . $request->Nom . '%')
                         ->get();
     }
    
    

     
    

     return view('layoutspp.searchCodepromo' , compact('result','codepromos_filter')) 
    ->with('i',$result, $codepromos_filter);
   // return view('layoutspp.searchclient' , compact('client_filter','name','Nom','cin','nb_v','etatcpt','result')) 
    //->with('i', $client_filter,$name,$ville,$cin,$nb_v,$etatcpt,$result);

   }
}
