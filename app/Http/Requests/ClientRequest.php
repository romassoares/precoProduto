<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name' => 'required|max:100|min: 3',
            'city' => 'max:70|min: 3',
            'district' => 'max:100|min:3',
            'street' => 'max:100|min: 3',
            'number' => 'numeric',
            'contact' => 'max:11|min:8'
        ];
    }
}
