<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\V1;

use App\Models\Album;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class AlbumControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function a_user_can_get_all_albums(): void
    {
        $count = $this->faker->numberBetween(1, 5);
        Album::factory()->count($count)->create();

        $response = $this->getJson(route('v1.albums.index'));
        $response
            ->assertSuccessful()
            ->assertJsonCount($count, 'data')
        ;
    }

    /** @test */
    public function a_user_can_get_an_album(): void
    {
        $album = Album::factory()->create();

        $response = $this->getJson(route('v1.albums.show', $album->hash));
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
}
