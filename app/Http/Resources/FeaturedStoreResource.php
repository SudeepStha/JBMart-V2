<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FeaturedStoreResource extends JsonResource
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
            "store_name" => $this->store_name,
            "store_type_id" => $this->store_type_id,
            "address" => $this->address,
            "minimum_order" => $this->minimum_order,
            "store_description" => $this->store_description,
            "contact" => $this->contact,
            "website" => $this->website,
            "logo" => asset($this->logo),
            "featured_image" => asset($this->featured_image),
        ];
    }
}
