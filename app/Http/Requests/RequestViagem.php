<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestViagem extends FormRequest
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
        return [
            'data_boleia' => 'required|date|after_or_equal:today',
            'destino' => 'required| regex:(^[a-z])',
            'origem' => 'required| regex:(^[a-z])',
            'idcarro' => 'required',
        ];
    }

    public function messages(){
        
        return[
        'destino.required'  =>'obrigatorio',
        'destino.regex'  =>'so letras minuscula',
        'origem.required'  =>'obrigatorio',
        'origem.regex'  =>'so letras minuscula'
        ];

    }
}
