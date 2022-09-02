<?php

namespace App\Exports;

use App\Models\Clients;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'id',
            'name',
            'prenom',
            'avatar',
            'tel',
            'ville',
            'email',
            'cin',
            'usertype',
            'nb_v',
            'etatcpt',
            'solde'
        ];
    }

    public function collection()
    {
        //return Clients::all();
        return collect(Clients::getClients());
    }

    
}
