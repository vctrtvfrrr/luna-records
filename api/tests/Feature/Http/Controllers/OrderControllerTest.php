<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function an_admin_can_get_all_orders(): void
    {
        $count = $this->faker->numberBetween(1, 5);
        Order::factory()->count($count)->create();

        $response = $this->getJson(route('admin.orders.index'));
        $response
            ->assertSuccessful()
            ->assertJsonCount($count, 'data')
        ;
    }
}
