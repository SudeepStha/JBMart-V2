<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CMS_Return_PolicyResource extends JsonResource
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
            "store_id" => $this->store_id,
            "title" => $this->title,
            "description" => $this->description,
        ];
    }
}
