<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Clients extends Model
{
    use HasFactory;   
    protected $table="users" ; 
    protected $fillable = ['id' ,'name','prenom' ,'avatar', 'tel', 'ville', 'email' , 'cin' , 'usertype' ,  'nb_v' ,'etatcpt'  ,'solde' ];

    public static function getClients()
    {
        $result = DB::table('users')
        ->select('id','name','prenom' ,'avatar', 'tel', 'ville', 'email' , 'cin' , 'usertype' , 'nb_v', 'etatcpt'  , 'solde')
        ->where('usertype', '=' , '0')->get()->toArray(); 
        return $result;
    }

}
