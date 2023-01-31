<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function an_admin_can_get_all_customers(): void
    {
        $count = $this->faker->numberBetween(1, 5);
        Customer::factory()->count($count)->create();

        $response = $this->getJson(route('admin.customers.index'));
        $response
            ->assertSuccessful()
            ->assertJsonCount($count, 'data')
        ;
    }
}
