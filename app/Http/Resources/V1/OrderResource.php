<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->user->name,
            'billing_address'=>$this->billing_info,
            'shipping_address'=>$this->shipping_address,
            'payBy'=>$this->paymentOption->name,
            'delivery_status'=>$this->delivery_status,
            'payment_status'=>$this->payment_status,
            'total'=>$this->total,
            'grand_total'=>$this->grand_total,
            'coupon_discount'=>$this->coupon_discount,
            'shipping_charge'=>$this->shipping_charge,
            // add more fields as needed
            'order_details' => OrderDetailResource::collection($this->orderDetails)
        ];
    }
}
