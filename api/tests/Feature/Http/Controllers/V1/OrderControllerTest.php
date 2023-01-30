<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\V1;

use App\Models\Album;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function a_user_can_create_a_new_order(): void
    {
        $album = Album::factory()->create();
        $payload = $this->newOrderPayload($album->hash);

        $response = $this->postJson(route('v1.orders.store'), $payload);
        $response
            ->assertCreated()
            ->assertJson(
                fn (AssertableJson $json) => $json
                    ->where('data.quantity', $payload['items']['quantity'])
                    ->where('data.delivery_fee', $payload['items']['delivery_fee'])
                    ->where('data.customer.name', $payload['name'])
                    ->where('data.customer.email', $payload['email'])
                    ->where('data.album.name', $album->name)
                    ->where('data.album.price', $album->price)
                    ->etc()
            )
        ;

        $this->assertDatabaseHas('albums', [
            'id'    => $album->id,
            'stock' => $album->stock - $payload['items']['quantity'],
        ]);
    }

    /** @test */
    public function a_user_cannot_create_an_order_for_an_out_of_stock_album(): void
    {
        $album = Album::factory()->create(['stock' => 0]);
        $payload = $this->newOrderPayload($album->hash);

        $response = $this->postJson(route('v1.orders.store'), $payload);
        $response->assertUnprocessable();
    }

    /**
     * Returns payload data for creating a new order.
     */
    private function newOrderPayload(string $albumId): array
    {
        return [
            'card'       => $this->faker->creditCardNumber(),
            'expires_at' => $this->faker->creditCardExpirationDateString(expirationDateFormat: 'm/y'),
            'cvv'        => (string) $this->faker->numberBetween(100, 999),
            'name'       => $this->faker->firstName().' '.$this->faker->lastName(),
            'email'      => $this->faker->safeEmail(),
            'phone'      => $this->faker->phoneNumber(),
            'address'    => $this->faker->address(),
            'items'      => [
                'album_id'     => $albumId,
                'quantity'     => $this->faker->numberBetween(1, 15),
                'delivery_fee' => $this->faker->numberBetween(500, 4500),
            ],
        ];
    }
}
