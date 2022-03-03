<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $category = $this->route()->parameter('category');

        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ];

        if($category){
            $rules['slug'] = 'required|unique:categories,slug,' . $category->id;
        }

        return $rules;
    }
}
