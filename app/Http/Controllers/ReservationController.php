<?php

namespace App\Http\Controllers;
use Carbon\Carbon ; 
use App\Models\Vehicules;
use App\Models\Parking ; 
use App\Models\User ;
use App\Models\Reservation;
use App\Models\Codepromo;
use App\Models\Places ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Mail\CodePromoMail ;
use Mail ;
use App\Http\Requests\ReservationFormRequest; 
use DB  ;
// use App\Http\Controllers\Carbon ; 

class ReservationController extends Controller

{
    public function afficher (){
        $user=User::find(Auth::user()->id);
        $now=Carbon::now() ; 
        $nb_reservation=Reservation::where('id_client','=',Auth::user()->id)->count();
        $nb_reservation_expired=Reservation::where('date_fin','<',$now)->count();
        $nb_reservation_not_expired=Reservation::where('date_fin','>',$now)->count();
        $solde =$user->solde ;
      
        $reservation= Reservation::where('id_client', '=' ,Auth::user()->id )->get(); 

        return view('client/layouts.reservations' , compact ( 'now','solde'  , 'reservation' , 'nb_reservation' , 'nb_reservation_expired' , 'nb_reservation_not_expired')) ; 


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

        }
   
}

    
    public function add_reservation(Request $request ,$id){

       
        $user=User::find(Auth::user()->id);
        $solde =$user->solde ;
        
        $couverte=$request["couverte"] ; // data from form to search place with this option 
        $parking = Parking::find($id) ;
        $vehicule = Vehicules::find($request["id_vehicule"]) ; 
        $type_v = $vehicule->type ; 
        
        // Calcul des jous , mois , année , heure , minutes 
        $interval = Carbon::parse($request["date_fin"])->diff(Carbon::parse($request["date_debut"]));
        $nb_jours = $interval->d ;
        $nb_mois = $interval->m ;
        $nb_année = $interval->y ;
        $nb_heures = $interval->h ;
        $nb_minutes = $interval->i ;
        
        // dd($nb_jours) ;
        // dd($nb_mois) ;
        // dd($nb_année) ;
        // dd($nb_heures) ;
        // dd($nb_minutes) ;
        
        //function to search place and save it and get id 

        $place= Places::where([
                               ['etat', '=' , '0'] ,
                               ['couverte', '=' , $request["couverte"]] ,
                               ['typev', '=' , $type_v ],
                               ['id_parking', '=' , $id]
                               ] )->first();                                
        // // Changer état du place 
      
        if( is_null($place)){
            return redirect()->back()->with('message'  , 'Parking est plein !  ') ;
        }
          
        else{
            DB::update('update places set etat= ?  where id = ?', ["1",$place->id]);
        }
     

        $reservation = new Reservation ;  

        $reservation->date_debut = $request["date_debut"];   //data from form
        $reservation->date_fin = $request["date_fin"];       //data from form
        $reservation->id_vehicule = $request["id_vehicule"] ; //data from form
        $reservation->id_client = Auth::user()->id ;
        $reservation->id_parking = $id ; 
        $reservation->id_place = $place->id ;// from link
        // $reservation->id_codepromos = $request["id_codepromos"] ; 
      
        if($type_v=='1'){
            $coeff_type=1;
        }
        else{
            $coeff_type=0.5;
        }

        if($couverte=='1'){
            $coeff_couverte=1.2;
        }
        else{
            $coeff_couverte=1;
        }
        
        $prix_heure=$parking->prix_heure ;
        $prix_jour=$parking->prix_jour ;
        $prix_mois=$parking->prix_mois ;
        
        
        $prix = ((($nb_heures * $prix_heure) + ($nb_jours * $prix_jour) + ($nb_mois * $prix_mois ) +($nb_minutes * $prix_heure / 60 ) ) * $coeff_couverte * $coeff_type ) - $solde ;
        $reservation->prix = $prix; 
        $reservation->save() ; 


        return redirect('clients')->with('message'  , 'Client ajouté avec succés ! ') ;
   }
     

        $nb_reservation=Reservation::where('id_client','=',Auth::user()->id)->count();
        $Codepromo = Codepromo::get();

        
        foreach ($Codepromo as $cp) {
            if($cp->nb_reserv == $nb_reservation ){
                 
                    $datalist=[
                        "Nom"=> $cp->Nom ,
                        "Code"=>$cp->Code, 
                        "Pourcentage"=>$cp->Pourcentage, 
                        "nb_reserv"=>$cp->nb_reserv, 
                        "name_client"=>Auth::user()->name 
                    ] ; 
                    Mail::to(Auth::user()->email)->send(new CodePromoMail($datalist)) ;
            }
            else {
                continue ;
            }
            
        }

        
         
      
        return redirect('reservations')->with('message'  , 'Réservation ajouté avec succés , merci de télécharger votre ticket envoyé en email ! ') ;
   }  

   pubic function display()
   {
    $reservation = Reservation::all();

    return view('layoutspp.reservation', compact('reservation'));
   }

}
