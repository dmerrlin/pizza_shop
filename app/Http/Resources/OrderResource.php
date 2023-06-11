<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'products' => json_decode($this->products),
            'total_price' => $this->total_price,
            'timestamps' => $this->timestamps
        ];
    }
}
