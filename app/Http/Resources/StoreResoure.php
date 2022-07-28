<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResoure extends JsonResource
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
            "store_name" => $this->store_name,
            "Store_type_id" => $this->store_type->id,
            "store_type" => $this->store_type->name,
            "address" => $this->address,
            "minimum_order" => $this->minimum_order,
            "store_description" =>  $this->store_description,
            "contact" => $this->contact,
            "website" => $this->website,
            "logo" => asset($this->logo),
            "featured_image" => asset($this->featured_image),
            "sunday" => $this->sunday,
            "monday" => $this->monday,
            "tuesday" => $this->tuesday,
            "wednesday" => $this->wednesday,
            "thursday" => $this->thursday,
            "friday" => $this->friday,
            "saturday" => $this->saturday,
            "user_id" => $this->user_id,
            "visibility" => $this->visibility,
            'categories' => CategoryResource::collection($this->categories),
            'products' => ProductResource::collection($this->products),

        ];
    }
}
