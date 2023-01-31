<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'             => $this->faker->firstName().' '.$this->faker->lastName(),
            'email'            => $this->faker->safeEmail(),
            'phone'            => $this->faker->phoneNumber(),
            'address'          => $this->faker->address(),
            'card_last_digits' => mb_substr($this->faker->creditCardNumber(), -4),
            'card_expires_at'  => $this->faker->creditCardExpirationDateString(expirationDateFormat: 'm/y'),
        ];
    }
}
