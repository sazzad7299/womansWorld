<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsApiResource extends JsonResource
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
            'name' => $this->name,
            'slug'=>$this->slug,
            'category'=>$this->category->name,
            'brand'=>$this->brand->name,
            'mainPrice'=>floatval($this->price),
            'discount'=>"-".discount_in_percentage($this->id)."%",
            'dicoutPrice'=>sellPrice($this->id),
            'total_reviewes'=>$this->total_reviewes,
            'avg_review'=>$this->total_avarage_rating,
            'stock'=>floatval($this->stock),
            'display'=>$this->display,
        ];
    }
}
