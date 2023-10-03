<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class OrdersResource extends JsonResource
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
            'payBy'=>$this->paymentOption->name,
            'delivery_status'=>$this->delivery_status,
            'payment_status'=>$this->payment_status,
            'grand_total'=>$this->grand_total,
            'order_date' =>$this->date,
        ];
    }
}
