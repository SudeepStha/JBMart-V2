<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CartCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'store_id' => $this->collection->first()->store_id,
            'store_name' => $this->collection->first()->store->store_name,
            'total' => $this->collection->sum(function ($cart_item) {
                return $cart_item->product->final_price * $cart_item->qty;
            }),
            'featured_image' => asset($this->collection->first()->store->featured_image),
            'total_quantity' =>  $this->collection->sum('qty'),
            'total_items' => $this->collection->count(),
            'data' => CartResource::collection($this->collection),
        ];
    }
}
