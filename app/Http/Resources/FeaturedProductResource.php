<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeaturedProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'sku' => $this->sku,
            'unit_id' => $this->unit_id,
            'price' => $this->price,
            'featured_image' => asset($this->featured_image),
            'category_id' => $this->category_id,
            'description' => $this->description,
            'store_id' => $this->store_id,
            'is_discount' => $this->is_discount,
            'final_price' => $this->final_price
        ];
    }
}
