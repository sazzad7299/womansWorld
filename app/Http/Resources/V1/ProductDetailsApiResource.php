<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\V1\ReviewsApiResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\ProductColorApiResource;

class ProductDetailsApiResource extends JsonResource
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
            'id' => (integer)$this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'display' => $this->display,
            'tags' => $this->tags,
            'stock'=>$this->stock,
            'mainPrice'=>$this->price,
            'discount'=>"-".discount_in_percentage($this->id)."%",
            'dicoutPrice'=>sellPrice($this->id),
            'brand' => $this->brand->name,
            'category' => $this->category->name,
            'details'=>$this->description,
            'total_reviewes'=>$this->total_reviewes,
            'total_avarage_rating'=>$this->total_avarage_rating,
            'photos'=>ProductPhotoApiResource::collection($this->photos),
            'sizes'=>ProductSizeApiResource::collection($this->size),
            'colors'=>ProductColorApiResource::collection($this->colors),
            'reviews'=>ReviewsApiResource::collection($this->reviews),
        ];
    }
}
