<?php

namespace App\Http\Controllers;
use App\Models\User ;
use App\Models\Parking ; 
use App\Models\Reservation ; 
use App\Models\Codepromo ; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon ; 

class DashboardController extends Controller
{
    public function dashboard(){
        $clients = User::where('usertype', '=' , '0')->count();
        $parkings = Parking::count() ;
        $reservations = Reservation::count();
        $codespromo = Codepromo::count();
        // chartes js 
        // clients chart
        $clientschart = User::select('id' , 'created_at')->where('usertype', '=' , '0')->get()->groupBy(function($clientschart){
            return Carbon::parse($clientschart->created_at)->format('M') ; 
   

        });
        
        // clients
        $monthsclient=[] ; 
        $monthscountclient=[] ; 

        foreach($clientschart as $m => $values){
            $monthsclient[]=$m ;
            $monthscountclient[] = count($values); 
            
        }

        // parkings

        $parkingschart = Parking::select('id' , 'created_at')->get()->groupBy(function($parkingschart){
           return Carbon::parse($parkingschart->created_at)->format('M') ; 
        });
        
        $monthsparkings=[] ; 
        $monthscountparkings=[] ; 

        foreach($parkingschart as $m => $values){
            $monthsparkings[]=$m ;
            $monthscountparkings[] = count($values); 
            
        }

        
           // reservation chart

           $reservationschart = Reservation::select('id' , 'created_at')->get()->groupBy(function($reservationschart){
            return Carbon::parse($reservationschart->created_at)->format('M') ; 
        }); 

        
        $monthsreservation=[] ; 
        $monthscountreservation=[] ; 

        foreach($reservationschart as $m => $values){
            $monthsreservation[]=$m ;
            $monthscountreservation[] = count($values); 
        }

         // pie chart

         $reservations_ville= DB::table('reservations')->join('parkings', 'reservations.id_parking' , '=' , 'parkings.id')->select('reservations.id' , 'parkings.ville')->get()->groupBy(function($reservations_ville){
            return $reservations_ville->ville ; 
        }); 

        
        $villereservation=[] ; 
        $villecountreservation=[] ; 

        foreach($reservations_ville as $m => $values){
            $villereservation[]=$m ;
            $villecountreservation[] = count($values); 
        }
        

      
      

        

        return view('layoutspp.tableau-de-bord' , [
            'parkings'=>$parkings,
            'clients' =>$clients , 
            'reservations' =>$reservations,  
            'codespromo'=> $codespromo , 
            'clientschart'=>$clientschart ,
            'monthsclient' =>$monthsclient ,
            'monthscountclient' =>$monthscountclient ,
            'parkingschart'=>$parkingschart ,
            'monthsparkings' =>$monthsparkings ,
            'monthscountparkings' =>$monthscountparkings , 
            'reservationschart'=>$reservationschart  ,
            'monthsreservation' =>$monthsreservation ,
            'monthscountreservation' =>$monthscountreservation,
            'villereservation'=>$villereservation,
            'villecountreservation'=>$villecountreservation 

      
            
        ]); 
    }
}