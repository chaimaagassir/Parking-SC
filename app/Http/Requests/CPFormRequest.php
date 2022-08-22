<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CPFormRequest extends FormRequest
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
            'Nom'=>['required' , 'string'],
            'Code'=>['required' , 'string'],
            'Pourcentage'=>['required' , 'integer'],
            'nb_reserv'=>['sometimes' , 'integer']

        ] ; 
        return $rules; 
    }
}
