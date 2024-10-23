<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jardinier>
 */
class JardinierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom'=> fake()->name(),
            'prenom'=> fake()->name(),
            'telephone'=> fake()->phoneNumber(),
            'localisation'=>fake()->name(),
            'horaire'=> fake()->time(),
            'cout'=> $this->faker->randomNumber(3),
            'specialite'=> fake()->randomElement(['Paysagiste','Jardinier d’entretien','fleuriste',' Jardinier horticole','Arboriculteur']),
        ];
    }
}
