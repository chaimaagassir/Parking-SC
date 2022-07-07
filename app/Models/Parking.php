<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    use HasFactory;   
    protected $table="parkings" ; 
    protected $fillable = ['ville','emplacement' ,'image', 'description', 'numéro de téléphone', 'nb_p_c_voiture' , 'nb_p_c_moto' , 'nb_p_nc_voiture' , 'nb_p_nc_moto' , 'prix'];

}
