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
        $clientschart = User::select('id' , 'created_at')->where('usertype', '=' , '0')->get()->groupby(function($clientschart){
            Carbon::parse($clientschart->created_at)->format('M') ; 
   

        });
        // clients
        $monthsclient=[] ; 
        $monthscountclient=[] ; 

        foreach($clientschart as $m => $values){
            $monthsclient[]=$m ;
            $monthscountclient[] = count($values); 
        }

        // parkings
        $monthsparkings=[] ; 
        $monthscountparkings=[] ; 

        foreach($clientschart as $m => $values){
            $monthsparkings[]=$m ;
            $monthscountparkings[] = count($values); 
        }

        // reservation
        
        $monthsreservation=[] ; 
        $monthscountreservation=[] ; 

        foreach($clientschart as $m => $values){
            $monthsreservation[]=$m ;
            $monthscountreservation[] = count($values); 
        }

         // parking chart

        $parkingschart = Parking::select('id' , 'created_at')->get()->groupby(function($parkingschart){
            Carbon::parse($parkingschart->created_at)->format('M') ; 
        });

         // reservation chart

        $reservationschart = Reservation::select('id' , 'created_at')->get()->groupby(function($reservationschart){
            Carbon::parse($reservationschart->created_at)->format('M') ; 
        }); 

        // code promo chart

        // $codespromochart = Codepromo::select('id' , 'created_at')->get()->groupby(function($codespromochart){
        //     Carbon::parse($codespromochart->created_at)->format('M') ; 
        // });

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
            'monthscountreservation' =>$monthscountreservation 
      
            
        ]); 
    }
}