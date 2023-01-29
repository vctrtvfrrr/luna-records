<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use App\Models\Album;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class AlbumControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * PHPUnit constructor.
     */
    protected function setUp(): void
    {
        parent::setUp();

        Storage::fake('public');
    }

    /** @test */
    public function an_admin_can_get_all_albums(): void
    {
        $count = $this->faker->numberBetween(1, 5);
        Album::factory()->count($count)->create();

        $response = $this->getJson(route('albums.index'));
        $response
            ->assertSuccessful()
            ->assertJsonCount($count, 'data')
        ;
    }

    /** @test */
    public function an_admin_can_create_a_new_album(): void
    {
        $payload = Album::factory()->make()->toArray();
        $payload['cover'] = UploadedFile::fake()->image('cover.jpg');

        $response = $this->postJson(route('albums.store'), $payload);
        $response
            ->assertCreated()
            ->assertJson(
                fn (AssertableJson $json) => $json
                    ->where('data.name', $payload['name'])
                    ->where('data.artist', $payload['artist'])
                    ->etc()
            )
        ;

        Storage::disk('public')->assertExists(Album::COVER_PATH.'/'.$payload['cover']->hashName());
    }

    /** @test */
    public function an_admin_can_get_an_album(): void
    {
        $album = Album::factory()->create();

        $response = $this->getJson(route('albums.show', $album->hash));
        $response
            ->assertOk()
            ->assertJson(
                fn (AssertableJson $json) => $json
                    ->where('data.id', $album->hash)
                    ->where('data.name', $album->name)
                    ->where('data.artist', $album->artist)
                    ->etc()
            )
        ;
    }

    /** @test */
    public function an_admin_can_update_an_album(): void
    {
        $album = Album::factory()->create();

        $payload = [
            'released_at' => $this->faker->dateTimeInInterval('-50 years', 'now')->format('Y-m-d'),
            'cover'       => UploadedFile::fake()->image('cover.jpg'),
        ];

        $response = $this->patchJson(route('albums.update', $album->hash), $payload);
        $response
            ->assertOk()
            ->assertJson(
                fn (AssertableJson $json) => $json
                    ->where('data.released_at', $payload['released_at'])
                    ->etc()
            )
        ;

        Storage::disk('public')->assertExists(Album::COVER_PATH.'/'.$payload['cover']->hashName());
    }

    /** @test */
    public function an_admin_can_delete_a_album(): void
    {
        $file = UploadedFile::fake()->image('cover.jpg');
        $filename = Storage::disk('public')->putFile(Album::COVER_PATH, $file);
        $album = Album::factory()->state(['cover' => $filename])->create();

        $response = $this->deleteJson(route('albums.destroy', $album->hash));
        $response->assertNoContent();

        $this->assertModelMissing($album);
        Storage::disk('public')->assertMissing($album->cover);
    }
}
