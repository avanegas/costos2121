<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'grupo_material_id' => 'required',
            'name'    => 'required',
            'unidad'  => 'required',
            'precio'  => 'required'
        ];

        return $rules;
    }
}
