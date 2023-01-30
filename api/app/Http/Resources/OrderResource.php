<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'           => $this->hash,
            'customer'     => CustomerResource::make($this->whenLoaded('customer')),
            'album'        => AlbumResource::make($this->whenLoaded('album')),
            'quantity'     => $this->quantity,
            'delivery_fee' => $this->delivery_fee,
            'total_cost'   => $this->total_cost,
        ];
    }
}
