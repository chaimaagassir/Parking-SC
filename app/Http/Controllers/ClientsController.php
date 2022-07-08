<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User ;
use App\Http\Requests\ClientFormRequest; 


class ClientsController extends Controller
{
    public function afficher()
    {
        $client= User::paginate(5);  
        return view('layoutspp.clients' , compact('client')) 
        ->with('i',$client); 
    }  

    public function add(){
        return view('layoutspp.ajouter-client');
    }

   public function add_client(ClientFormRequest $request){
        $data = $request->validated();   
        $client = new User ;  
        $client->name = $data["nom"] ; 
        $client->prenom = $data["prenom"] ;
        $client->email = $data["email"] ;
        $client->ville = $data["ville"] ; 
        $client->cin = $data["cin"] ;
        $client->tel = $data["tel"] ;
        $client->password = bcrypt('12345678') ; 
        $client->save() ; 

        return redirect('clients')->with('message'  , 'Client ajouté avec succés ! ') ;
   }   
}
  