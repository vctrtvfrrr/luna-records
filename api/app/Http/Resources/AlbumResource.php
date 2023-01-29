<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class AlbumResource extends JsonResource
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
            'id'          => $this->hash,
            'name'        => $this->name,
            'artist'      => $this->artist,
            'cover'       => $this->when($this->cover, Storage::disk('public')->url($this->cover)),
            'released_at' => $this->when($this->released_at, $this->released_at->format('Y-m-d')),
            'duration'    => $this->duration,
            'stock'       => $this->stock,
            'price'       => $this->price,
        ];
    }
}
