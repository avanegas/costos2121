<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $post = $this->route()->parameter('post');

        $rules = [
            'name'   => 'required',
            'slug'   => 'required|unique:posts',
            'status' => 'required',
            'file'   => 'image'
        ];

        if($post){
            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        }

        if($this->status=="PUBLISHED"){
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'tags'        => 'required',
                'excerpt'     => 'required',
                'body'        => 'required'
            ]);
        }
        return $rules;
    }
}
