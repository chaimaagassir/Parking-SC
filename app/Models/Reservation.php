<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table="reservations" ; 
    protected $fillable = ['date_debut','date_fin' ,'statut' ,'prix',  'prix_a_payer', 'id_client', 'id_parking', 'id_place' , 'id_vehicule' , 'id_codepromos'];
}
