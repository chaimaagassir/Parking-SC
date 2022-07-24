<?php

namespace App\Exports;

use App\Models\Parking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ParkingsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Parking::all();
        return collect(Parking::getAllParkings());
    }
    public function headings():array{
        return[
            'id',
            'ville',
            'emplacement',
            'image',
            'description',
            'numéro_téléphone',
            'nb_p_c_voiture',
            'nb_p_c_moto',
            'nb_p_nc_voiture',
            'nb_p_c_moto',
            'prix'
        ];
    }
}
