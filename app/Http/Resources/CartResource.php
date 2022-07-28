<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            "cart_id" => $this->id,
            "user_id" => $this->user_id,
            "store_id" => $this->store_id,
            'qty' => $this->qty,
            'amount' => $this->product->final_price * $this->qty,
            // 'store' => new StoreResoure($this->store),
            'product' => new ProductResource($this->product),
            "store name" => $this->store->store_name
        ];
    }
}
