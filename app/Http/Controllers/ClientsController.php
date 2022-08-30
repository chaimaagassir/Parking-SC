<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User ;
use App\Exports\ClientsExport;
use App\Http\Requests\ClientFormRequest; 
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
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
        $clients= User::where('usertype', '=' , '0')->paginate(5); 
        $client_filter = User::distinct()->where('usertype', '=' , '0')->get(['ville']) ;
       
        return view('layoutspp.clients' , compact('clients','client_filter')) 
        ->with('i',$clients,$client_filter); 
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

   //Search Client
   public function clientSearch(Request $request)
   {
     $client_filter = User::distinct()->get(['ville']) ; 
     $name = $_GET['name'] ;
     $ville = $_GET['ville'] ;
     $cin = $_GET['cin'] ;
     $nb_v = $_GET['nb_v'] ;
     $etatcpt = $_GET['etatcpt'] ;

     if($request->name)
     {
         $result = User::where('name','LIKE','%' . $request->name . '%')->get();
     }
      if($request->ville)
     {
         $result = User::where('ville','LIKE','%' . $request->ville . '%')->get();
     }
    if($request->cin)
     {
         $result = User::where('cin','LIKE','%' . $request->cin . '%')->get();
     }
     if($request->nb_v)
     {
        $result = User::where('nb_v','LIKE','%' . $request->nb_v . '%')->get();
     }
     if($request->etatcpt)
     {
        $result = User::where('etatcpt','LIKE','%' . $request->etatcpt . '%')->get();
     }
     if($request->ville && $request->name)
     {
        
         $result = User::where('ville','LIKE','%' . $request->ville . '%')
                         ->where('name','LIKE','%' . $request->name . '%')
                         ->get();
     }
     if($request->cin && $request->name)
     {
        
         $result = User::where('cin','LIKE','%' . $request->cin . '%')
                         ->where('name','LIKE','%' . $request->name . '%')
                         ->get();
     }
     if($request->nb_v && $request->name)
     {
        
         $result = User::where('nb_v','LIKE','%' . $request->nb_v . '%')
                         ->where('name','LIKE','%' . $request->name . '%')
                         ->get();
     }
     if($request->etatcpt && $request->name)
     {
        
         $result = User::where('etatcpt','LIKE','%' . $request->etatcpt . '%')
                         ->where('name','LIKE','%' . $request->name . '%')
                         ->get();
     }
     if($request->cin && $request->name && $request->ville)
     {
        
         $result = User::where('cin','LIKE','%' . $request->cin . '%')
                         ->where('name','LIKE','%' . $request->name . '%')
                         ->where('ville','LIKE','%' . $request->ville . '%')
                         ->get();
     }
     if($request->nb_v && $request->name && $request->ville)
     {
        
         $result = User::where('nb_v','LIKE','%' . $request->nb_v . '%')
                         ->where('name','LIKE','%' . $request->name . '%')
                         ->where('ville','LIKE','%' . $request->ville . '%')
                         ->get();
     }
     if($request->etatcpt && $request->name && $request->ville)
     {
        
         $result = User::where('etatcpt','LIKE','%' . $request->etatcpt . '%')
                         ->where('name','LIKE','%' . $request->name . '%')
                         ->where('ville','LIKE','%' . $request->ville . '%')
                         ->get();
     }
     if($request->etatcpt && $request->name && $request->cin)
     {
        
         $result = User::where('etatcpt','LIKE','%' . $request->etatcpt . '%')
                         ->where('name','LIKE','%' . $request->name . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->get();
     }
     if($request->nb_v && $request->name && $request->cin)
     {
        
         $result = User::where('nb_v','LIKE','%' . $request->nb_v . '%')
                         ->where('name','LIKE','%' . $request->name . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->get();
     }
     if($request->nb_v && $request->name && $request->etatcpt)
     {
        
         $result = User::where('nb_v','LIKE','%' . $request->nb_v . '%')
                         ->where('name','LIKE','%' . $request->name . '%')
                         ->where('etatcpt','LIKE','%' . $request->etatcpt . '%')
                         ->get();
     }
     if($request->name && $request->ville && $request->cin && $request->nb_v)
     {
        
         $result = User::where('name','LIKE','%' . $request->name . '%')
                         ->where('ville','LIKE','%' . $request->ville . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->where('nb_v','LIKE','%' . $request->nb_v . '%')
                         ->get();
     }
     if($request->name && $request->ville && $request->cin && $request->etatcpt)
     {
        
         $result = User::where('name','LIKE','%' . $request->name . '%')
                         ->where('ville','LIKE','%' . $request->ville . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->where('etatcpt','LIKE','%' . $request->etatcpt . '%')
                         ->get();
     }
     if($request->name && $request->nb_v && $request->cin && $request->etatcpt)
     {
        
         $result = User::where('name','LIKE','%' . $request->name . '%')
                         ->where('nb_v','LIKE','%' . $request->nb_v . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->where('etatcpt','LIKE','%' . $request->etatcpt . '%')
                         ->get();
     }
     if($request->name && $request->nb_v && $request->cin && $request->etatcpt && $request->nb_v)
     {
        
         $result = User::where('name','LIKE','%' . $request->name . '%')
                         ->where('nb_v','LIKE','%' . $request->nb_v . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->where('etatcpt','LIKE','%' . $request->etatcpt . '%')
                         ->where('ville','LIKE','%' . $request->ville . '%')
                         ->get();
     }
   //Ville
   if($request->ville && $request->cin)
   {
      
       $result = User::where('ville','LIKE','%' . $request->ville . '%')
                       ->where('cin','LIKE','%' . $request->cin . '%')
                       ->get();
   }
   if($request->ville && $request->nb_v)
   {
      
       $result = User::where('ville','LIKE','%' . $request->ville . '%')
                       ->where('nb_v','LIKE','%' . $request->nb_v . '%')
                       ->get();
   }
   if($request->ville && $request->etatcpt)
   {
      
       $result = User::where('ville','LIKE','%' . $request->ville . '%')
                       ->where('etatcpt','LIKE','%' . $request->etatcpt . '%')
                       ->get();
   }
   if($request->ville && $request->nb_v && $request->cin)
     {
        
         $result = User::where('ville','LIKE','%' . $request->ville . '%')
                         ->where('nb_v','LIKE','%' . $request->nb_v . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->get();
     }
     if($request->ville && $request->etatcpt && $request->cin)
     {
        
         $result = User::where('ville','LIKE','%' . $request->ville . '%')
                         ->where('etatcpt','LIKE','%' . $request->etatcpt . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->get();
     }
     if($request->ville && $request->etatcpt && $request->nb_v)
     {
        
         $result = User::where('ville','LIKE','%' . $request->ville . '%')
                         ->where('etatcpt','LIKE','%' . $request->etatcpt . '%')
                         ->where('nb_v','LIKE','%' . $request->nb_v . '%')
                         ->get();
     }
     if($request->ville && $request->nb_v && $request->cin && $request->etatcpt)
     {
        
         $result = User::where('ville','LIKE','%' . $request->ville . '%')
                         ->where('nb_v','LIKE','%' . $request->nb_v . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->where('etatcpt','LIKE','%' . $request->etatcpt . '%')
                         ->get();
     }
     //CIN
     if($request->etatcpt && $request->cin)
     {
        
         $result = User::where('etatcpt','LIKE','%' . $request->etatcpt . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->get();
     }
     if($request->cin && $request->nb_v)
     {
        
         $result = User::where('cin','LIKE','%' . $request->cin . '%')
                         ->where('nb_v','LIKE','%' . $request->nb_v . '%')
                         ->get();
     }

     
    

     return view('layoutspp.searchclient' , compact('result','client_filter')) 
    ->with('i',$result, $client_filter);
   // return view('layoutspp.searchclient' , compact('client_filter','name','ville','cin','nb_v','etatcpt','result')) 
    //->with('i', $client_filter,$name,$ville,$cin,$nb_v,$etatcpt,$result);

   }

   public function sendEmail($id)
   {
       $users = DB::select('select * from users where id = ?',[$id]);
       return view('layoutspp.sendemail',['users'=>$users]);
   }
   public function sendfunction(Request $req)
    {
        $email= $req->email;
        $datalist=[
            "email"=>$req->email, 
            "subject"=>$req->subject,
             "description"=>$req->description,
        ] ;
       
        Mail::to($email)->send(new TestMail($datalist));
        return redirect('clients')->with('message','Email sent');
    }
}


  