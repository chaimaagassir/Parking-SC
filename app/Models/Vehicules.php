<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicules extends Model
{
    use HasFactory;
    protected $table="vehicules" ; 
    protected $fillable = ['immatricule','type' ,'id_client'];
}
