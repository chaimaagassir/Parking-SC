<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Clients extends Model
{
    use HasFactory;   
    protected $table="users" ; 
    protected $fillable = ['name','prenom' ,'avatar', 'tel', 'ville', 'email' , 'cin' , 'usertype' ,  'etatcpt' ];

    public static function getClients()
    {
        $result = DB::table('users')
        ->select('id','name','prenom' ,'avatar', 'tel', 'ville', 'email' , 'cin' , 'usertype' , 'etatcpt')
        ->get()->toArray(); 
        return $result;
    }

}
