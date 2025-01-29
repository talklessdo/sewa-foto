<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fotografer>
 */
class FotograferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = Arr::random([1, 4, 5, 6, 9, 10 ]);
        return [
            'id' => $userId,
            'email_fotografer' => fake()->dateTime(),
            'job' => 'no_order',
        ];
    }
}
