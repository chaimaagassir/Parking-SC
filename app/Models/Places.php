<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Places extends Model
{
    use HasFactory;
    protected $table="places" ; 
    protected $fillable = ["'etat', ,'numero' , couverte' ,'typev', 'id_parking' "];

    public static function getPlaces()
    {
        $result = DB::table('places')
        ->select('id','etat','couverte' ,'typev', 'numero', 'id_parking')
        ->get()->toArray(); 
        return $result;
    }
    public function parking()
     {
        return $this->belongsTo('App\Models\Parking','id_parking');
     }

}
