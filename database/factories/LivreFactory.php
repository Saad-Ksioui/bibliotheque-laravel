<?php

namespace Database\Factories;

use App\Models\Auteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livre>
 */
class LivreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => fake() -> sentence(2),
            'anneepub' => fake() -> year(),
            'nbrpages' => fake() -> numberBetween(40, 190),
            'auteur_id' => fake() -> numberBetween(1, Auteur::count())
        ];
    }
}
