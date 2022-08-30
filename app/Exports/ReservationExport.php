<?php

namespace App\Exports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReservationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'id',
            'date_debut',
            'date_fin' ,
            'prix', 
            'id_client', 
            'id_parking',
             'id_place' , 
             'id_vehicule' , 
             'id_codepromos'
            
        ];
    }
    public function collection()
    {
        return collect(Reservation::getReservation());
    }
}
