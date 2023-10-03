<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class getProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'image'    => 'mimes:jpeg,jpg,png,gif,webp|max:10000',
            'message'    => 'nullable|string',
            'quantity'=>'nullable|numeric',
        ];
    }
}
