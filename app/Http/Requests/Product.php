<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' => 'required|max:100',
            'amount' => 'required|number',
            'price' => 'required|number',
        ];
    }
}
