<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Codepromo;
use App\Http\Requests\CPFormRequest; 
use App\Models\User ;
use DB;

class CodepromoController extends Controller
{
    public function afficher()
    {
        $codespromo= Codepromo::paginate(7);
        return view('layoutspp.codespromo' , compact('codespromo')) 
        ->with('i',$codespromo); 
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
        $codespromo->save() ; 

         // $client = User::get();

        
        // foreach ($client as $c) {
        //     
        //             $datalist=[
        //                 "Nom"=> $codespromo->Nom  ,
        //                 "Code"=>$cp->$codespromo->Code, 
        //                 "Pourcentage"=>$cp->Pourcentage, 
        //                 "nb_reserv"=>$cp->$codespromo->Pourcentage, 
        //                 "name_client"=>Auth::user()->name 
        //             ] ; 
        //             Mail::to(c->email)->send(new CodePromoMail($datalist)) ;
        //     }
            
        // }

        return redirect('codespromo')->with('message'  , 'Code promo ajouté avec succés ! ') ;
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
    $codepromos->save();

    return redirect('codespromo')->with('message','Code Promo updated');
   }
}
