<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GrupoObreroRequest extends FormRequest
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
            'description'  => 'required'
        ];

        return $rules;
    }
}
