<?php

namespace App\Http\Controllers;
use App\Models\User ;
use App\Models\Parking ; 
use App\Models\Reservation ; 
use App\Models\Codepromo ; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashbordController extends Controller
{
    public function dashboard(){
        $clients = User::where('usertype', '=' , '0')->count();
        $parkings = Parking::count() ;
        $reservations = Reservation::count();
        $codespromo = Codepromo::count();
        return view('layoutspp.tableau-de-bord' , compact('parkings','clients' , 'reservations', 'codespromo')); 
    }
}