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
use App\Mail\ReservationEmail ;
use App\Http\Requests\ReservationFormRequest; 
use Mail ;
use PDF ;

use DB  ;
// use App\Http\Controllers\Carbon ; 

class ReservationController extends Controller

{  

    public function exportIntoExcelReservation()
    {
           return Excel::download(new ReservationExport,'ReservationList.xlsx');
    }
    public function afficher (){
        $user=User::find(Auth::user()->id);
        $now=Carbon::now() ; 
        $nb_reservation=Reservation::where('id_client','=',Auth::user()->id)->count();
        $nb_reservation_expired=Reservation::where('date_fin','<',$now)->where('id_client','=',Auth::user()->id)->count();
        $nb_reservation_not_expired=Reservation::where('date_fin','>',$now)->where('id_client','=',Auth::user()->id)->count();
        $solde =$user->solde ;
      
        $reservations= DB::table('reservations')
                                ->where('reservations.id_client' , '=' ,Auth::user()->id)
                                ->join('vehicules', 'reservations.id_vehicule' , '=' , 'vehicules.id')
                                ->join('parkings', 'reservations.id_parking' , '=' , 'parkings.id')
                                ->join('places', 'reservations.id_place' , '=' , 'places.id')
                                 ->select('reservations.*' , 'parkings.ville' , 'parkings.emplacement','parkings.image' ,  'places.couverte' , 'places.numero' , 'vehicules.immatricule' , 'vehicules.type')
                                 ->get() ; 

        return view('client/layouts.reservations' , compact ( 'now','solde'  , 'reservations' , 'nb_reservation' , 'nb_reservation_expired' , 'nb_reservation_not_expired')) ; 

    }
    public function afficher_admin (){
        $reservations= DB::table('reservations')
        ->join('users', 'reservations.id_client' , '=' , 'users.id')
        ->join('vehicules', 'reservations.id_vehicule' , '=' , 'vehicules.id')
        ->join('parkings', 'reservations.id_parking' , '=' , 'parkings.id')
        ->join('places', 'reservations.id_place' , '=' , 'places.id')
         ->select('reservations.*' , 'parkings.ville' , 'parkings.emplacement', 'places.couverte' , 'places.numero' , 'vehicules.immatricule' , 'vehicules.type' , 'users.profile_photo_path')
         ->paginate(5) ; 
         

         return view('layoutspp.réservations' , compact('reservations')); 

    }

    public function id_parking_form($id){
        if (Auth::guest()){
           return redirect()->route('login'); 
        }else{
            $vehicules= Vehicules::where('id_client', '=' , Auth::user()->id)->get(); 
            return view('client/layouts.reserver' , compact('vehicules','id'))->with('i',$vehicules ,$id); 

        } 

    }

    public function delete_reservation($id) {
   
        $reservation=Reservation::find($id);
        //  $place=Places::find($reservation->id_place); 
        $user=User::find($reservation->id_client);
        $now=Carbon::now() ; 

            DB::update('update places set etat= ?  where id = ?', ["0",$reservation->id_place]);
        if($reservation->date_fin > $now){
            $newsolde = $user->solde + $reservation->prix_a_payer ; 
            DB::update('update users set solde= ?  where id = ?', [$newsolde,$reservation->id_client]);
        }
        

        
        

        $reservation->delete();
    
    
        return redirect('réservations')->with('message','Reservation Deleted');
    }
   
    public function reservation_details_admin($id){

        $r=Reservation::find($id) ;

        // dd($r->id_codepromos) ;

        if(is_null($r->id_codepromos )) {
            $reservations= DB::table('reservations')
            ->where('reservations.id' , "=" , $id)
            ->join('users', 'reservations.id_client' , '=' , 'users.id')
            ->join('vehicules', 'reservations.id_vehicule' , '=' , 'vehicules.id')
            ->join('parkings', 'reservations.id_parking' , '=' , 'parkings.id')
            ->join('places', 'reservations.id_place' , '=' , 'places.id')
           
             ->select('reservations.*' , 'parkings.*' ,  'places.*' , 'vehicules.*' , 'users.*')
             ->get() ; 
             return view('layoutspp.reservationdetails' , compact('reservations')) 
             ->with('i',$reservations); 

        }else{

            $reservations= DB::table('reservations')
            ->where('reservations.id' , "=" , $id)
            ->join('users', 'reservations.id_client' , '=' , 'users.id')
            ->join('vehicules', 'reservations.id_vehicule' , '=' , 'vehicules.id')
            ->join('parkings', 'reservations.id_parking' , '=' , 'parkings.id')
            ->join('places', 'reservations.id_place' , '=' , 'places.id')
            ->join('codepromos', 'reservations.id_codepromos' , '=' , 'codepromos.id')
             ->select('reservations.*' , 'parkings.*' ,  'places.*' , 'vehicules.*', 'codepromos.Code' , 'codepromos.Pourcentage'  , 'users.*')
             ->get() ; 
             return view('layoutspp.reservationdetails' , compact('reservations')) 
             ->with('i',$reservations); 
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
        
        $reservation = new Reservation ; 
        
        $prix = ((($nb_heures * $prix_heure) + ($nb_jours * $prix_jour) + ($nb_mois * $prix_mois ) +($nb_minutes * $prix_heure / 60 ) ) * $coeff_couverte * $coeff_type );
        $reservation->prix = $prix; 
        // des conditions pour vérifier existence du code promo valide ou pas expiré ou pas 

        $now=Carbon::now() ;
        $promocode = Codepromo::where('Code' , '=' , $request['promocode'])->first() ; 
        
        if($request['promocode']){
            if(is_null($promocode)){
         
                return redirect()->back()->with('message'  , 'invalid promo code !  ') ;
            }else{
                if($promocode->date_expiration < $now){
                    return redirect()->back()->with('message'  , 'Promo code expired !  ') ;
                }else{
                    $reservation->id_codepromos = $promocode->id ; 
                    if($solde > $prix){
                        $prix_a_payer = 0 ;
                        DB::update('update users set solde= ?  where id = ?', [$solde-$prix,Auth::user()->id]);
                        
    
                    }else if($solde < $prix || $solde==$prix){
                        $prix_a_payer = ($prix-$solde) -  ($prix *$promocode->Pourcentage / 100 );
                        DB::update('update users set solde= ?  where id = ?', ['0',Auth::user()->id]);
                    }
    
                }
    
    
            }

        }else{
            if($solde > $prix){
                $prix_a_payer = 0 ;
                DB::update('update users set solde= ?  where id = ?', [$solde-$prix,Auth::user()->id]);
                

            }else if($solde < $prix || $solde==$prix){
                $prix_a_payer = $prix-$solde ;
                DB::update('update users set solde= ?  where id = ?', ['0',Auth::user()->id]);
            }

        }

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
     
        // enregitrer les reservation
        

        $reservation->date_debut = $request["date_debut"];   //data from form
        $reservation->date_fin = $request["date_fin"];       //data from form
        $reservation->id_vehicule = $request["id_vehicule"] ; //data from form
        $reservation->id_client = Auth::user()->id ;
        $reservation->id_parking = $id ; 
        $reservation->id_place = $place->id ;// from link
        
        

        $reservation->prix_a_payer = $prix_a_payer ;
        $reservation->save() ; 
       
        // email code promo si il a atteint nb reservation parmi les codes de fidélité

        $nb_reservation=Reservation::where('id_client','=',Auth::user()->id)->count();
        $Codepromo = Codepromo::get();

        
        
        foreach ($Codepromo as $cp) {
            if($cp->nb_reserv == $nb_reservation ){
                 
                    $datalist=[
                        "Nom"=> $cp->Nom ,
                        "Code"=>$cp->Code, 
                        "Pourcentage"=>$cp->Pourcentage,
                        "date_expiration"=>$cp->date_expiration,  
                        "nb_reserv"=>$cp->nb_reserv, 
                        "name_client"=>Auth::user()->name 
                    ] ; 
                    Mail::to(Auth::user()->email)->send(new CodePromoMail($datalist)) ;
            }
            else {
                continue ;
            }
            
        }

        // email récapitulatif réservation

        $reservation = Reservation::find($reservation->id) ;

        $client = User::find($reservation->id_client) ; 
        $parking = Parking::find($reservation->id_parking) ;
        $place = Places::find($reservation->id_place) ;
        $vehicule = Vehicules::find($reservation->id_vehicule) ;

<<<<<<< HEAD
        $pdf = PDF::loadView('client/layouts.ticket',[
            'reservation' => $reservation ,
            'parking' => $parking ,
            'place' => $place ,
            'vehicule' => $vehicule, 
            'client' => $client
        ]);
=======
        // $pdf = PDF::loadView('client/layouts.ticket',[
        //     'reservation' => $reservation ,
        //     'parking' => $parking ,
        //     'place' => $place ,
        //     'vehicule' => $vehicule, 
        //     'client' => $client
        // ]);
>>>>>>> bd0e803ac486b728889f183e3bb1633589dde05b

        $datalist=[
            'reservation' => $reservation ,
            'parking' => $parking ,
            'place' => $place ,
            'vehicule' => $vehicule, 
            'client' => $client
        ] ; 
        Mail::to(Auth::user()->email)->send(new ReservationEmail($datalist) )   ;
<<<<<<< HEAD

        Mail::to(Auth::user()->email)->send(new ReservationEmail($datalist)) ;



      
        return redirect('reservations')->with('message'  , 'Réservation ajouté avec succés , merci de télécharger votre ticket envoyé en email ! ') ;
=======

        return redirect('reservations')->with('message'  , 'Réservation added successfully , please upload your ticket ! ') ;
>>>>>>> bd0e803ac486b728889f183e3bb1633589dde05b
  
   }

   public function cancel_reservation($id){
    $reservation=Reservation::find($id) ; 
    $user = User::find($reservation->id_client) ; 
    $solde_user = $user->solde + $reservation->prix_a_payer  ; 
    DB::update('update places set etat= ?  where id = ?', ["0",$reservation->id_place]);
    DB::update('update users set solde= ?  where id = ?', [$solde_user,$reservation->id_client]);
    DB::update('update reservations set statut= ?  where id = ?', ['annulée',$id]);

    return redirect('reservations')->with('message'  , 'Réservation canceled successfully ') ;
  

   }
     public function telecharger_ticket($id_reservation){
        $reservation = Reservation::find($id_reservation) ;

        $client = User::find($reservation->id_client) ; 
        $parking = Parking::find($reservation->id_parking) ;
        $place = Places::find($reservation->id_place) ;
        $vehicule = Vehicules::find($reservation->id_vehicule) ;

        $pdf = PDF::loadView('client/layouts.ticket',[
            'reservation' => $reservation ,
            'parking' => $parking ,
            'place' => $place ,
            'vehicule' => $vehicule, 
            'client' => $client
        ]);
        

        return $pdf->download('Ticket' . $client->name . '_' .$client->prenom. '.pdf') ; 
     }
 }  


