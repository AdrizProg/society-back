<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Auth\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asociacion>
 */
class AsociacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'nif' => $this->faker->unique()->numerify('#########'),
            'direccion' => $this->faker->address,
            'user_id' => 1,
        ];
    }
}
