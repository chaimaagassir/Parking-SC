<?php

namespace App\Http\Controllers;
use App\Models\Vehicules;
use App\Models\Parking ; 
use App\Models\User ;
use App\Models\Reservation;
use App\Models\Codepromo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\CodePromoMail ;
use Mail ;
use App\Http\Requests\ReservationFormRequest; 

class ReservationController extends Controller

{
    public function afficher (){
        $user=User::find(Auth::user()->id);
        $solde =$user->solde ; 
       
        return view('client/layouts.reservations' , compact ('solde' )) ; 


    }

    public function id_parking_form($id){
        if (Auth::guest()){
           return redirect()->route('login'); 
        }else{
            $vehicules= Vehicules::where('id_client', '=' , Auth::user()->id)->get(); 
            return view('client/layouts.reserver' , compact('vehicules','id'))->with('i',$vehicules ,$id); 
        }
         
        
        

    }

    
    public function add_reservation(ReservationFormRequest $request ,$id){
       
        $data = $request->validated(); 
        $couverte=$data["couverte"] ; // data from form to serch place with this option 
        $parking = Parking::find($id) ; 
        
        $reservation = new Reservation ;  
        $reservation->date_debut = $data["date_debut"] ;   //data from form
        $reservation->date_fin = $data["date_fin"] ;       //data from form
        $reservation->id_vehicule = $data["id_vehicule"] ; //data from form
        $reservation->prix = $parking->prix;                // foreing key doit etre calculé 
        $reservation->id_client = Auth::user()->id ;
        $reservation->id_parking = $id ; // from link
       
        // $reservation->id_codepromos = $data["id_codepromos"] ; 
        $reservation->id_place = 'blabla' ;
        
        if(type_v=='1'){
            $coeff_type=1;
        }
        else{
            $coeff_type=0.5;
        }

        if(couverte=='1'){
            $coeff_couverte=1.2;
        }
        else{
            $coeff_couverte=1;
        }
        
        $prix = ([($nb_heures * $prix_heure) + ($nb_jour * $prix_jour) + ($nb_mois * $prix_mois ) ] * $coeff_couverte * coeff_type ) - solde ;
        
        $reservation->save() ; 

      
        // $nb_reservation=Reservation::where('id_client','=',Auth::user()->id)->count();
        // $Codepromo = Codepromo::get();

        
        // foreach ($Codepromo as $cp) {
        //     if($cp->nb_reserv = $nb_reservation ){
        //         $message= 'bravo' ; 
        //             $datalist=[
        //                 "Nom"=> $cp->Nom ,
        //                 "Code"=>$cp->Code, 
        //                 "Pourcentage"=>$cp->Pourcentage, 
        //                 "nb_reserv"=>$cp->nb_reserv, 
        //                 "name_client"=>Auth::user()->name 
        //             ] ; 
        //             Mail::to(Auth::user()->email)->send(new CodePromoMail($datalist)) ;
        //     }
            
        // }

      

        return redirect('clients')->with('message'  , 'Client ajouté avec succés ! ') ;
   }  

}
