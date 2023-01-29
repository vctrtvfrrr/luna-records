<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::query()->get();

        return AlbumResource::collection($albums);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {
        $album = Album::create($request->input());

        if ($request->hasFile('cover')) {
            $album->cover = $request->file('cover')->store(Album::COVER_PATH, 'public');
            $album->save();
        }

        return AlbumResource::make($album);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        return AlbumResource::make($album);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $album->update($request->input());

        if ($request->hasFile('cover')) {
            if ($album->cover !== null) {
                Storage::disk('public')->delete($album->cover);
            }

            $album->cover = $request->file('cover')->store(Album::COVER_PATH, 'public');
            $album->save();
        }

        return AlbumResource::make($album);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        if ($album->cover !== null) {
            Storage::disk('public')->delete($album->cover);
        }

        $album->delete();

        return response()->noContent();
    }
}
