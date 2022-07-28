<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "sku" => $this->sku,
            "unit" => $this->unit->name,
            "price" => $this->price,
            "final_price" => $this->final_price,
            "is_discount" => ($this->final_price<$this->price),
            // "special_price" => $this->special_price,
            "is_featured" => $this->is_featured,
            "product_status" => $this->product_status,
            "description" => $this->description??"N/A",
            "featured_image" => asset($this->featured_image),
            "category_id" => $this->category_id,
            "store_id" => $this->store_id,
            "visibility" => $this->visibility,
        ];
    }
}
