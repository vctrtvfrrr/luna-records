<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Album;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Track>
 */
class TrackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'album_id' => Album::factory(),
            'number'   => (string) $this->faker->numberBetween(1, 25),
            'title'    => Str::title($this->faker->words(asText: true)),
            'duration' => $this->faker->numberBetween(90, 720),
        ];
    }
}
