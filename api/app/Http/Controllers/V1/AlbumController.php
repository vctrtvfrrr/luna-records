<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\AlbumResource;
use App\Models\Album;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::query()->get([
            'id',
            'name',
            'artist',
            'cover',
            'price',
        ]);

        return AlbumResource::collection($albums);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        $album->load(['tracks', 'tags']);

        return AlbumResource::make($album);
    }
}
