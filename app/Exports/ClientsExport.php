<?php
namespace App\Exports;

use App\Models\Clients;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ClientsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Clients::all();
        //return Parking::all();
        return collect(User::getAllUsers());
    }
    
    public function headings():array{
        return[

        
            'id',
            'nom',
            'prenom',
            'telephone',
            'ville',
            'email',
            'cin',
            'Nb vehicule',
            'Etat compte'
        ];
    }
}