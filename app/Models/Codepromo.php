<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codepromo extends Model
{
    use HasFactory;
    protected $table="codepromos" ; 
    protected $fillable = ['Nom','Code'. 'Occasion' , 'date_expiration' ,'Pourcentage','nb_reserv'];
}
