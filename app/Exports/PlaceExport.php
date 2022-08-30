<?php

namespace App\Exports;

use App\Models\Places;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PlaceExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'id',
            'etat',
            'couverte',
            'typev',
            'numero',
            'id_parking'
        ];
    }
    public function collection()
    {
        return collect(Places::getPlaces());
    }
}
