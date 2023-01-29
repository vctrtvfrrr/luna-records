<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Tag;
use App\Models\Track;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $albums = json_decode(file_get_contents(__DIR__.'/albums.json'), true);

        foreach ($albums as $albumData) {
            $album = new Album([
                'name'        => $albumData['name'],
                'artist'      => $albumData['artist'],
                'released_at' => $albumData['released_at'],
                'duration'    => $albumData['duration'],
                'stock'       => $albumData['stock'],
                'price'       => $albumData['price'],
            ]);
            $album->cover = $this->storeFromUrl($albumData['cover'], Album::COVER_PATH);
            $album->save();

            $tracks = [];
            foreach ($albumData['tracks'] as $track) {
                $tracks[] = new Track($track);
            }
            $album->tracks()->saveMany($tracks);

            $tags = [];
            foreach ($albumData['tags'] as $tag) {
                $tags[] = Tag::firstOrNew(['name' => $tag]);
            }
            $album->tags()->saveMany($tags);
        }
    }

    /**
     * Retrieve an file from a given URL, save on 'public' storage and return the file path.
     */
    private function storeFromUrl(string $url, string $path): string
    {
        $urlInfo = pathinfo($url);
        $fileContents = file_get_contents($url);

        $file = '/tmp/'.$urlInfo['basename'];
        file_put_contents($file, $fileContents);

        $uploadedFile = new UploadedFile($file, $urlInfo['basename']);

        return $uploadedFile->store($path, 'public');
    }
}
