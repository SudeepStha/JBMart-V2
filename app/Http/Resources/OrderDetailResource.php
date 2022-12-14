<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
            'product' => new ProductResource($this->product),
            'qty' => $this->qty,
            'rate' => $this->rate,
            'amount' => $this->amount,
            'short_note' => $this->short_note,
        ];
    }
}
