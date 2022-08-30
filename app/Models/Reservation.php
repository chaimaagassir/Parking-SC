<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reservation extends Model
{
    use HasFactory;
    protected $table="reservations" ; 

   protected $fillable = ['date_debut','date_fin' ,'prix', 'id_client', 'id_parking', 'id_place' , 'id_vehicule' , 'id_codepromos'];


   public function parking()
   {
      return $this->belongsTo('App\Models\Parking','id_parking');
   }
   public function client()
   {
      return $this->belongsTo('App\Models\Clients','id_client');
   }
   public function place()
   {
      return $this->belongsTo('App\Models\Places','id_place');
   }
   public function vehicule()
   {
      return $this->belongsTo('App\Models\Vehicules','id_vehicule');
   }
   public function codepromo()
   {
      return $this->belongsTo('App\Models\Codepromo','id_codepromos');
   }

   public static function getReservation()
   {
       $result = DB::table('reservations')
       ->select('id','date_debut','date_fin' ,'prix', 'id_client', 'id_parking', 'id_place' , 'id_vehicule' , 'id_codepromos' )
       ->get()->toArray(); 
       return $result;
   }

}
