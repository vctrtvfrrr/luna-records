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
            'cover'       => $this->when($this->cover, fn () => Storage::disk('public')->url($this->cover)),
            'released_at' => $this->when($this->released_at, fn () => $this->released_at->format('Y-m-d')),
            'duration'    => $this->whenHas('duration'),
            'stock'       => $this->whenHas('stock'),
            'price'       => $this->price,
            'tracks'      => $this->whenLoaded('tracks', fn () => $this->tracks->map(fn ($item) => [
                'number'   => (string) $item->number,
                'title'    => $item->title,
                'duration' => $item->duration,
            ])),
            'tags' => $this->whenLoaded('tags', fn () => $this->tags->map(fn ($item) => $item->name)),
        ];
    }
}
