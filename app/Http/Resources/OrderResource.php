<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user_id' => $this->user_id,
            'store_id' => $this->store_id,
            'shipping_date' => $this->shipping_date,
            'shipping_time' => $this->shipping_time,
            'total' => $this->total,
            'delivery_charge' => $this->delivery_charge,
            'grand_total' => $this->grand_total,
            'order_status' => $this->order_status,
            'delivery_status' => $this->delivery_status,
            'order_details' => OrderDetailResource::collection($this->order_details),
        ];
    }
}
