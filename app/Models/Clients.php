<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;   
    protected $table="users" ; 
    protected $fillable = ['name','prenom' ,'image', 'tel', 'ville', 'email' , 'cin' , 'usertype' ,  'etatcpt' ];

}
