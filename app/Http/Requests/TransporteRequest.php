<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransporteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'zona_id' => 'required',
            'name'    => 'required',
            'unidad'  => 'required',
            'tipo'    => 'required',
            'tarifa'  => 'required'
        ];

        return $rules;
    }
}
