<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParkingFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =[
            'ville'=>['required' , 'string'],
            'emplacement'=>['required' , 'string'],
            'tel'=>['required' , 'string'],
            'nb_p_c_voiture'=>['required' , 'integer'],
            'nb_p_nc_voiture'=>['required' , 'integer'],
            'nb_p_c_moto'=>['required' , 'integer'],
            'nb_p_nc_moto'=>['required' , 'integer'],
            'prix_heure'=>['required', 'integer'],
            'prix_jour'=>['required', 'integer'],
            'prix_mois'=>['required', 'integer'],
            'description'=>['sometimes'],
            'image'=>['required']
            

        ] ; 
        return $rules;
    }
}
