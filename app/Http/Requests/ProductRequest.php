<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [

            'name'              => 'required|string|max: 255',
            'category_id'       => 'required|numeric',
            'brand_id'          => 'required|numeric',
            'price'             => 'required|numeric',
            'old_price'         => 'required|numeric',
            'discount_type'  => 'nullable|numeric',
            'discount'          => 'nullable|numeric',
            'tags'              => 'nullable|string',
            'description'       => 'nullable|string',
            'size.*'            => 'nullable|numeric',
            'color.*'           => 'nullable|numeric',
            'stock'           => 'required|numeric',
            'status'           => 'nullable|numeric',
            'featured'           => 'nullable',
            'p_set'           => 'nullable',
            'new'           => 'nullable',
            'photos.*'          => 'mimes : jpeg,jpg,png,gif,webp|max:1000|nullable',
        ];

        if ($this->getMethod() == 'POST') {

            return $rules + [

                'display' => 'mimes:jpeg,jpg,png,gif,webp|max:1000|required',
                'slug'    => 'required|string|max:255|unique:products,slug',

            ];
        } else {

            return $rules + [

                'display' => 'mimes:jpeg,jpg,png,gif,webp|max:1000|nullable',
                'slug'    => 'required|string|max:255|unique:products,slug,' . $this->product->id,

            ];
        }
    }
}
