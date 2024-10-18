<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Jardinier;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description_service'=> fake()->name(),
            'date_réservation'=> fake()->date(),
            'client'=> fake()->name(),
            'feedback'=>fake()->text(),
            'reference'=> fake()->phoneNumber(),
            'jardinier_id'=> Jardinier::factory(),
        ];
    }
}
