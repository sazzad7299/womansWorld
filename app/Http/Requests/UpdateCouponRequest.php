<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCouponRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'details' => 'nullable|string',
            'type' => 'required|in:1,2,3,4',
            'limit' => 'required|integer|min:0',
            'code' => 'required|unique:coupons,code,' .$this->coupon->id,
            'amount_type' => 'required|in:1,2',
            'amount' => 'required|integer|min:0|' . ($this->input('amount_type') == 2 ? 'lt:100' : ''),
            'expires_at' => 'required|date',
            'status' => 'required|in:0,1',
        ];
    }
}
