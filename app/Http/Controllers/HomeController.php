<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

class HomeController extends Controller
{
    //
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype=='0')
            {
                return view('client.layouts.index') ;
            }
            else{
                return redirect()->route('tableau-de-bord') ; 
            }

        }
        else {
            return redirect()->back() ;
        }
    }
    
    public function firstpage(){
        if(Auth::id()){
            if(Auth::user()->usertype=='0')
            {
                return view('client.layouts.index') ;
            }
            elseif (Auth::user()->usertype=='1'){
                return redirect()->route('tableau-de-bord') ; 
            }

        }
        else {
            return view('client/layouts.index') ;
        }

    }
}

 

