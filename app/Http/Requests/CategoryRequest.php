<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $rules = [


            'parent_id'=>'nullable|numeric',
            'status'=>'nullable',

        ];

        if ($this->getMethod() == 'POST') {

            return $rules + [
                'name' => 'required|string|max:255|unique:categories,name',
                'slug'    => 'required|string|max:255|unique:categories,slug',
                'logo'    => 'mimes:jpeg,jpg,png,gif,webp|max:10000|required_if:parent_id,null',
            ];
        } else {

            return $rules + [
                'name' => 'required|string|max:255',
                'slug'    => 'required|string|max:255',
                'id' =>'required',
                'logo'    => 'mimes:jpeg,jpg,png,gif,webp|max:10000|nullable',

            ];
        }
    }
}
