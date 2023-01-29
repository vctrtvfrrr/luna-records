<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'        => Str::of($this->faker->sentence(nbWords: 1))->trim('.')->title()->toString(),
            'artist'      => $this->faker->company(),
            'released_at' => $this->faker->dateTimeInInterval('-50 years', 'now'),
            'duration'    => $this->faker->numberBetween(90, 720) * 10,
            'stock'       => $this->faker->numberBetween(100, 500),
            'price'       => $this->faker->biasedNumberBetween(300, 7000),
        ];
    }
}
