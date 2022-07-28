<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreCartResource extends JsonResource
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
            'store_id' => $this->id,
            'store_name' => $this->store_name,
            'total' => $this->carts->sum(function ($cart_item) { return $cart_item->product->final_price * $cart_item->qty;}),
            'featured_image' => asset($this->featured_image),
            'total_quantity' =>  $this->carts->sum('qty'),
            'total_items' => $this->carts->count(),
            'cart' => CartResource::collection($this->carts)                    
        ];
    }
}
