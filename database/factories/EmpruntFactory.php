<?php

namespace Database\Factories;

use App\Models\Livre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emprunt>
 */
class EmpruntFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dateemprunt' => fake() -> dateTimeBetween('-30 days', now())->format('Y-m-d'),
            'dateretour' => fake() -> dateTimeBetween(now(), '+30 days')->format('Y-m-d'),
            'livre_id' => fake() -> numberBetween(1, Livre::count()),
        ];
    }
}
