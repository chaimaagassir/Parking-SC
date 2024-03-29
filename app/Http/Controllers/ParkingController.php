<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Parking ; 
use App\Models\Places ;
use App\Models\Reservation;
use App\Http\Requests\ParkingFormRequest;
use App\Exports\ParkingsExport;
use Carbon\Carbon ; 
use Excel;
use DB;
class ParkingController extends Controller
{
    public function exportIntoExcel()
    {
           return Excel::download(new ParkingsExport,'parkinglist.xlsx');
    }
    public function exportIntoCSV()
    {
           return Excel::download(new ParkingsExport,'parkinglist.csv');
    }
    
    public function afficher(){
    
        $parking= Parking::paginate(5);
        $parking_filter = Parking::distinct()->get(['ville']) ;

        return view('layoutspp.parking' , compact('parking','parking_filter')) 
        ->with('i',$parking,$parking_filter);   
    }   
    public function afficherfind(){
        // vider les places expirés 
        $now=Carbon::now() ; 
        $reservation = Reservation::where([
                                 ['date_fin', '<' , $now],
                ])->get() ; 

        foreach ($reservation as $r) {
            DB::update('update places set etat= ?  where id = ?', ["0",$r->id_place]);
        }
        
        // affichage des parkings sur findplace

        $parkingf= Parking::paginate(5);
        $parking_filter = Parking::distinct()->get(['ville']) ; // pour éviter les redondances des ville sur select
      
        return view('client/layouts.findplace' , compact('parkingf', 'parking_filter')) 
        ->with('i',$parkingf,$parking_filter);   
    } 
    public function parking_details($parking_id){
        $parking= Parking::where('id', '=' , $parking_id)->get(); 
        $nb_places_vide = Places::where([
            ['etat', '=' , '0'],
            ['id_parking', '=' ,$parking_id ]
        ])->count() ; 
        // dd($nb_places_vide) ; 
        return view('client.layouts.parking-details' , compact('parking' , 'nb_places_vide')) 
        ->with('i',$parking); 

    }
    public function parking_details_admin($parking_id){
        $parking= Parking::where('id', '=' , $parking_id)->get(); 
        $nb_places_vide = Places::where([
            ['etat', '=' , '0'],
            ['id_parking', '=' ,$parking_id ]
        ])->count() ; 
        $nb_places_réservé = Places::where([
            ['etat', '=' , '1'],
            ['id_parking', '=' ,$parking_id ]
        ])->count() ; 
        return view('layoutspp.parkingdetails' , compact('parking', 'nb_places_vide' ,'nb_places_réservé' )) 
        ->with('i',$parking); 

    }
    public function place_details_admin($parking_id){
        $parking= Parking::where('id', '=' , $parking_id)->get(); 
       
        return view('layoutspp.placedetails' , compact('parking')) 
        ->with('i',$parking); 

    }
    public function add(){
        return view('layoutspp.ajouter-parking');
    }
   public function add_place(ParkingFormRequest $request){
        $data = $request->validated(); 
        $parking = new parking ; 
        $parking->ville = $data["ville"] ;   
        $parking->emplacement = $data["emplacement"] ;
        $parking->numéro_téléphone = $data["tel"] ;
        $parking->nb_p_c_voiture = $data["nb_p_c_voiture"] ; 
        $parking->nb_p_nc_voiture = $data["nb_p_nc_voiture"] ;
        $parking->nb_p_c_moto = $data["nb_p_c_moto"] ;
        $parking->nb_p_nc_moto = $data["nb_p_nc_moto"] ; 
        $parking->prix_heure = $data["prix_heure"] ;
        $parking->prix_jour = $data["prix_jour"] ;
        $parking->prix_mois = $data["prix_mois"] ;
        // if((isset($data["description"]))){
        //     $parking->description = $data["description"] ;
        // }
         $parking->description = isset($data["description"])? $data["description"] : null ; 
       
        if( $request->hasfile('image')){
            
            $file = $request->file('image') ;
            $extention = $file->getClientOriginalExtension() ; 
            $filename = time() . '.' . $extention ; 
            $file->move('uploads/parkings/', $filename); 
            $parking->image = $filename ; 
        }
      
        $parking->save() ;
        
         $numero = 0 ;
        //  création des places voiture couverte
        for($i=0 ; $i<$data["nb_p_c_voiture"]; $i++) 
        {
            $place = new places ; 
            $place->id_parking=$parking->id ; 
            $numero=$numero +1 ;
            $place->numero= $numero;
            $place->save() ;
       
        }
        // création des places voiture non couverte
        for($i=0 ; $i<$data["nb_p_nc_voiture"]; $i++) 
        {
            $place = new places ; 
            $place->id_parking=$parking->id ; 
            $place->couverte='0' ; 
            $numero=$numero +1 ;
            $place->numero= $numero;
            $place->save() ;
       
        }
        // création des place moto couverte
        for($i=0 ; $i<$data["nb_p_c_moto"]; $i++) 
        {
            $place = new places ; 
            $place->id_parking=$parking->id ; 
            $place->typev='0';
            $numero=$numero +1 ;
            $place->numero= $numero;
            $place->save() ;
       
        }
        // création des places non couverte moto
        for($i=0 ; $i<$data["nb_p_nc_moto"]; $i++) 
        {
            $place = new places ; 
            $place->id_parking=$parking->id ;
            $place->typev='0';
            $place->couverte='0' ; 
            $numero=$numero +1 ;
            $place->numero= $numero;
            $place->save() ;
       
        }
      

        return redirect('parkings' )->with('message'  , 'Parking ajouté avec succés ! '  ) ;
   }
   // filter function in find place 
   public function filter_find_place(){
    $parking_filter = Parking::distinct()->get(['ville']) ; // pour éviter les redondances des ville sur select
    $ville=$_GET['ville'] ;
    $data = Parking::where('ville', 'LIKE', "%" . $ville . "%")->get();    
    $data = Parking::where('ville', 'LIKE', "%" . $ville . "%")->get();

    return view('client/layouts.searchparking' , compact('data','parking_filter')) 
    ->with('i',$data, $parking_filter); 
   }

   public function delete_parkings($id)
   {
    $place=Places::where([['id_parking' ,  '=', $id] , ["etat"  , "=" , "1"] ])->count() ;
    //  si aucune place n'est avec un statut 1 réservé c'est bon supprimer parking
    if( $place == '0'){
         $data=Parking::find($id);
        $data->delete();
    return redirect('parkings')->with('message','Parking Deleted Successfully');

    }else{
        return redirect('parkings')->with('erreur','Impossible de supprimer ce parking car il ya des reservations dans ce parking');

    }

    
   }


   public function edit_parking($id)
   {
       $parkings = DB::select('select * from parkings where id = ?',[$id]);
       return view('layoutspp.modifier-parking',['parkings'=>$parkings]);
   }
   public function update_parking(Request $request,$id)
   
   {      
    
            // le parking à modifier
         $parkings = parking::find($id);
            $parkings->ville=$request->ville;
            $parkings->emplacement=$request->emplacement;
            $image=$request->file;
            if($image)
            {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->file->move('parkingimage',$imagename);

            $parkings->image=$imagename;
            }
        
            $parkings->numéro_téléphone=$request->numéro_téléphone;
            $parkings->prix_heure = $request->prix_heure;
            $parkings->prix_jour = $request->prix_jour;
            $parkings->prix_mois = $request->prix_mois;
            $parkings->description=$request->description;

            $parkings->save();
        
        // pour savoir les anciens valeurs 
        $ancien=Parking::find($id) ;
        /////// ////////////////////////////////////////////
        ///////////// Modification place couverte voiture /////////////////////////
        // ///////////////////////////////////////////////////

        //////// le cas de suppression des places existantes ////////

        if($ancien->nb_p_c_voiture > $request->nb_p_c_voiture){
            $nb_a_supprimer = $ancien->nb_p_c_voiture - $request->nb_p_c_voiture ;

            $nb_place = Places::where([['id_parking' , '=' , $id] , ['etat' , '=' , '0'] , ['typev', "=" , '1'] , ['couverte' , '=' , '1']])->count() ;  
            
            
            if($nb_place >= $nb_a_supprimer){
                $place_a_supprimer=Places::take($nb_a_supprimer)->where([['id_parking' , '=' , $id] , ['etat' , '=' , '0'] , ['typev', "=" , '1'] , ['couverte' , '=' , '1']])->delete();
                $parkings->nb_p_c_voiture=$request->nb_p_c_voiture;
                $parkings->save();
            }
            // le cas de suppression des places et le nombre de places vides ne sont pas suffisable pour modification
            else{

                return redirect('parkings')->with('erreur',' Impossible de modifier le nombre des places , des places dans ce parking sont réserver , merci  d\'essayer ultérieurement');
            }
            
        //////////le cas d'ajout des places   //////// 
        }elseif( $ancien->nb_p_c_voiture < $request->nb_p_c_voiture){
            // savoir le dernier numéro dans cette table 
           $dernier_numero =Places::all()->where('id_parking' , '=' , $id)->last()->numero ;
            // $dernier_numero= $place->numero; 
            

            $nb_place_a_ajouter = $request->nb_p_c_voiture - $ancien->nb_p_c_voiture ;
            // dd($nb_place_a_ajouter) ; 
            // création des places o continuant selon le vrai ordre de numéro place 
            for($i=0 ; $i<$nb_place_a_ajouter ; $i++) 
            {
                $place = new places ; 
                $place->id_parking=$id ; 
                $dernier_numero=$dernier_numero +1 ;
                $place->numero= $dernier_numero;
                $place->save() ;
                 
            
            }
            $parkings->nb_p_c_voiture=$request->nb_p_c_voiture;
            $parkings->save();

            
        }


          /////// ////////////////////////////////////////////
        ///////////// Modification place non couverte voiture /////////////////////////
        // ///////////////////////////////////////////////////
        
        //////// le cas de suppression des places existantes ////////

        if($ancien->nb_p_nc_voiture > $request->nb_p_nc_voiture){
            $nb_a_supprimer = $ancien->nb_p_nc_voiture - $request->nb_p_nc_voiture ;

            $nb_place = Places::where([['id_parking' , '=' , $id] , ['etat' , '=' , '0'] , ['typev', "=" , '1'] , ['couverte' , '=' , '0']])->count() ;  
            
            
            if($nb_place >= $nb_a_supprimer){
                $place_a_supprimer=Places::take($nb_a_supprimer)->where([['id_parking' , '=' , $id] , ['etat' , '=' , '0'] , ['typev', "=" , '1'] , ['couverte' , '=' , '0']])->delete();
                $parkings->nb_p_nc_voiture=$request->nb_p_nc_voiture;
                $parkings->save();
            }
            // le cas de suppression des places et le nombre de places vides ne sont pas suffisable pour modification
            else{

                return redirect('parkings')->with('erreur',' Impossible de modifier le nombre des places , des places dans ce parking sont réserver , merci  d\'essayer ultérieurement');
            }
            
        //////////le cas d'ajout des places   //////// 
        }elseif( $ancien->nb_p_nc_voiture < $request->nb_p_nc_voiture){
            // savoir le dernier numéro dans cette table 
           $dernier_numero =Places::all()->where('id_parking' , '=' , $id)->last()->numero ;
            // $dernier_numero= $place->numero; 
            

            $nb_place_a_ajouter = $request->nb_p_nc_voiture - $ancien->nb_p_nc_voiture ;
            // dd($nb_place_a_ajouter) ; 
            // création des places o continuant selon le vrai ordre de numéro place 
            for($i=0 ; $i<$nb_place_a_ajouter ; $i++) 
            {
                $place = new places ; 
                $place->id_parking=$id ; 
                $place->couverte='0' ;
                $dernier_numero=$dernier_numero +1 ;
                $place->numero= $dernier_numero;
                $place->save() ;
                 
            
            }
            $parkings->nb_p_nc_voiture=$request->nb_p_nc_voiture;
            $parkings->save();

            
        }
       
                  /////// ////////////////////////////////////////////
        ///////////// Modification place  couverte moto /////////////////////////
        // ///////////////////////////////////////////////////
        
        //////// le cas de suppression des places existantes ////////

        if($ancien->nb_p_c_moto > $request->nb_p_c_moto){
            $nb_a_supprimer = $ancien->nb_p_c_moto - $request->nb_p_c_moto ;

            $nb_place = Places::where([['id_parking' , '=' , $id] , ['etat' , '=' , '0'] , ['typev', "=" , '0'] , ['couverte' , '=' , '1']])->count() ;  
            
            
            if($nb_place >= $nb_a_supprimer){
                $place_a_supprimer=Places::take($nb_a_supprimer)->where([['id_parking' , '=' , $id] , ['etat' , '=' , '0'] , ['typev', "=" , '0'] , ['couverte' , '=' , '1']])->delete();
                $parkings->nb_p_c_moto=$request->nb_p_c_moto;
                $parkings->save();
            }
            // le cas de suppression des places et le nombre de places vides ne sont pas suffisable pour modification
            else{

                return redirect('parkings')->with('erreur',' Impossible de modifier le nombre des places , des places dans ce parking sont réserver , merci  d\'essayer ultérieurement');
            }
            
        //////////le cas d'ajout des places   //////// 
        }elseif( $ancien->nb_p_c_moto < $request->nb_p_c_moto){
            // savoir le dernier numéro dans cette table 
           $dernier_numero =Places::all()->where('id_parking' , '=' , $id)->last()->numero ;
            // $dernier_numero= $place->numero; 
            

            $nb_place_a_ajouter = $request->nb_p_c_moto - $ancien->nb_p_c_moto ;
            // dd($nb_place_a_ajouter) ; 
            // création des places o continuant selon le vrai ordre de numéro place 
            for($i=0 ; $i<$nb_place_a_ajouter ; $i++) 
            {
                $place = new places ; 
                $place->id_parking=$id ; 
                $place->typev='0';
                $dernier_numero=$dernier_numero +1 ;
                $place->numero= $dernier_numero;
                $place->save() ;
                 
            
            }
            $parkings->nb_p_c_moto=$request->nb_p_c_moto;
            $parkings->save();

            
        }

                          /////// ////////////////////////////////////////////
        ///////////// Modification place  non couverte moto /////////////////////////
        // ///////////////////////////////////////////////////
        
        //////// le cas de suppression des places existantes ////////

        if($ancien->nb_p_nc_moto > $request->nb_p_nc_moto){
            $nb_a_supprimer = $ancien->nb_p_nc_moto - $request->nb_p_nc_moto ;

            $nb_place = Places::where([['id_parking' , '=' , $id] , ['etat' , '=' , '0'] , ['typev', "=" , '0'] , ['couverte' , '=' , '0']])->count() ;  
            
            
            if($nb_place >= $nb_a_supprimer){
                $place_a_supprimer=Places::take($nb_a_supprimer)->where([['id_parking' , '=' , $id] , ['etat' , '=' , '0'] , ['typev', "=" , '0'] , ['couverte' , '=' , '0']])->delete();
                $parkings->nb_p_nc_moto=$request->nb_p_nc_moto;
                $parkings->save();
            }
            // le cas de suppression des places et le nombre de places vides ne sont pas suffisable pour modification
            else{

                return redirect('parkings')->with('erreur',' Impossible de modifier le nombre des places , des places dans ce parking sont réserver , merci  d\'essayer ultérieurement');
            }
            
        //////////le cas d'ajout des places   //////// 
        }elseif( $ancien->nb_p_nc_moto < $request->nb_p_nc_moto){
            // savoir le dernier numéro dans cette table 
           $dernier_numero =Places::all()->where('id_parking' , '=' , $id)->last()->numero ;
            // $dernier_numero= $place->numero; 
            

            $nb_place_a_ajouter = $request->nb_p_nc_moto - $ancien->nb_p_nc_moto ;
            // dd($nb_place_a_ajouter) ; 
            // création des places o continuant selon le vrai ordre de numéro place 
            for($i=0 ; $i<$nb_place_a_ajouter ; $i++) 
            {
                $place = new places ; 
                $place->id_parking=$id ; 
                $place->typev='0';
                $place->couverte='0' ; 
                $dernier_numero=$dernier_numero +1 ;
                $place->numero= $dernier_numero;
                $place->save() ;
                 
            
            }
            $parkings->nb_p_nc_moto=$request->nb_p_nc_moto;
            $parkings->save();

            
        }
       

       
       $parkings->save();

       return redirect('parkings')->with('message','parkings updated');

   }
   public function parkingSearch(Request $request)
   {
     $parking_filter = Parking::distinct()->get(['ville']) ; 
     $emplacement = $_GET['emplacement'] ;
     $ville = $_GET['ville'] ;
     $numéro_téléphone = $_GET['numéro_téléphone'] ;
     
    

     if($request->emplacement)
     {
         $result = Parking::where('emplacement','LIKE','%' . $request->emplacement . '%')->get();
     }
      if($request->ville)
     {
         $result = Parking::where('ville','LIKE','%' . $request->ville . '%')->get();
     }
    if($request->numéro_téléphone)
     {
         $result = Parking::where('numéro_téléphone','LIKE','%' . $request->numéro_téléphone . '%')->get();
     }
     
    
     if($request->ville && $request->emplacement)
     {
        
         $result = Parking::where('ville','LIKE','%' . $request->ville . '%')
                         ->where('emplacement','LIKE','%' . $request->emplacement . '%')
                         ->get();
     }
     if($request->ville && $request->cin)
     {
        
         $result = Parking::where('ville','LIKE','%' . $request->ville . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->get();
     }
     if($request->emplacement && $request->cin)
     {
        
         $result = Parking::where('emplacement','LIKE','%' . $request->emplacement . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->get();
     }
     if($request->emplacement && $request->cin && $request->ville)
     {
        
         $result = Parking::where('emplacement','LIKE','%' . $request->emplacement . '%')
                         ->where('cin','LIKE','%' . $request->cin . '%')
                         ->where('ville','LIKE','%' . $request->ville . '%')
                         ->get();
     }
    
    

     
    

     return view('layoutspp.searchparking' , compact('result','parking_filter')) 
    ->with('i',$result, $parking_filter);
   // return view('layoutspp.searchclient' , compact('client_filter','name','ville','cin','nb_v','etatcpt','result')) 
    //->with('i', $client_filter,$name,$ville,$cin,$nb_v,$etatcpt,$result);

   }


}
