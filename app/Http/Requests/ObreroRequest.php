<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObreroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'grupo_obrero_id' => 'required',
            'name'        => 'required',
            'jornalhora'  => 'required',
            'factor'      => 'required'
        ];

        return $rules;
    }
}
