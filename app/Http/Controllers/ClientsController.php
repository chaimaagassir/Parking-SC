<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User ;
use App\Exports\ClientsExport;
use App\Http\Requests\ClientFormRequest; 
use Excel;
use DB;



class ClientsController extends Controller
{
    public function exportIntoExcelClient()
    {
           return Excel::download(new ClientsExport,'clientlist.xlsx');
    }
    public function exportIntoCSVClient()
    {
           return Excel::download(new ClientsExport,'clientlist.csv');
    }
    public function afficher()
    {
        $client= User::where('usertype', '=' , '0')->paginate(5); 
       
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

   public function update_statuts($user_id , $user_statut){
    try{
        $update_user = User::whereId($user_id)->update([
            'etatcpt'=>$user_statut
        ]);

        if($update_user){
            
            if($user_statut == 0){
                $message='desactivé' ; 
            }else if($user_statut == 1){
                $message='activé' ; 
            }
            
            return redirect('clients')->with('message' , 'Compte '.$message .' avec succés !' ) ; 
        }
        return redirect('clients')->with('erreur' , 'Erreur !' ) ; 

    }
    catch(\throwable $th){
        throw $th; 
    }
    

   }
   public function delete_clients($id)
   {
    $data=User::find($id);
    $data->delete();

    return redirect('clients')->with('message','Client Deleted');
   }

   public function edit_function($id)
   {
       $users = DB::select('select * from users where id = ?',[$id]);
       return view('layoutspp.modifier-client',['users'=>$users]);
   }
   public function update_function(Request $request,$id)
   {
       $client_name = $request->input('name');
       $client_prenom = $request->input('prenom');
       $client_email = $request->input('email');
       $client_ville = $request->input('ville');
       $client_cin = $request->input('cin');
       $client_tel = $request->input('tel');
       

       DB::update('update users set name = ?, prenom = ?, email = ?, ville= ?, cin = ?, tel = ? where id = ?'
       , [$client_name,$client_prenom,$client_email,$client_ville,$client_cin,$client_tel,$id]);

       return redirect('clients')->with('message','Client updated');
   }
}
  