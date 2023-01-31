<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Album;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id'  => Customer::factory(),
            'album_id'     => Album::factory(),
            'quantity'     => $this->faker->numberBetween(1, 15),
            'delivery_fee' => $this->faker->numberBetween(500, 4500),
            'total_cost'   => $this->faker->numberBetween(2000, 9000),
        ];
    }
}
