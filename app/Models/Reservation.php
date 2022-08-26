<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table="reservations" ; 
<<<<<<< HEAD
    protected $fillable = ['date_debut','date_fin' ,'prix', 'id_client', 'id_parking', 'id_place' , 'id_vehicule' , 'id_codepromos'];


    public function parking()
    {
        return $this->hasMany(\App\Parking::class);
    }
=======
    protected $fillable = ['date_debut','date_fin' ,'prix',  'prix_a_payer', 'id_client', 'id_parking', 'id_place' , 'id_vehicule' , 'id_codepromos'];
>>>>>>> f45146192ebc1f7f12147c741cd5ac519c6fb9a6
}
