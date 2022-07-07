<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Codepromo;
use App\Http\Requests\PostFormRequest; 
use DB;

class CodepromoController extends Controller
{
    public function afficher()
    {
        $codespromo= Codepromo::paginate(7);
        return view('layouts.codespromo' , compact('codespromo')) 
        ->with('i',$codespromo); 
    }

    public function add(){
        return view('layouts.ajouter-codepromo');
    }

   public function promocodes(PostFormRequest $request){
        $data = $request->validated(); 
        $codespromo = new Codepromo ; 
        $codespromo->Nom = $data["Nom"] ; 
        $codespromo->Code = $data["Code"] ;
        $codespromo->Pourcentage = $data["Pourcentage"] ;
        $codespromo->save() ; 

        return redirect('codespromo')->with('message'  , 'Code promo ajouté avec succés ! ') ;
   }

   public function edit($codespromo_id){
    $codespromo= Codepromo::find($codespromo_id); 
    return view('layouts.modifier-codespromo' , compact('codespromo')) ;
   }
}
