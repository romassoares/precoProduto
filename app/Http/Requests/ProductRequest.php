<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'description' => 'required|max:100|min: 5',
            'amount' => 'required|numeric',
            'und' => 'required',
            'price' => 'required|numeric',
        ];
    }

    public function messages(){
        return [
            'description.required' => 'esse campo é obrigatório',
            'description.min' => 'campo deve ter no minimo 5 caracteres',
            'amount.required' => 'esse campo é obrigatório',
            'amount.numeric' => 'campo deve ser numérico',
            'price.required' => 'esse campo é obrigatório', 
            'price.numeric' => 'campo deve ser numérico',
            'und.required' => 'esse campo é obrigatório', 
        ];
    } 
}
