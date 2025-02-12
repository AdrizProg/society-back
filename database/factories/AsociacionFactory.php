<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asociacion;
use App\Models\User;

class AsociacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asociacion::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->regexify('[A-Za-z0-9]{50}'),
            'nif' => fake()->regexify('[A-Za-z0-9]{9}'),
            'direccion' => fake()->regexify('[A-Za-z0-9]{100}'),
            'descripcion' => fake()->regexify('[A-Za-z0-9]{200}'),
            'imagen' => fake()->regexify('[A-Za-z0-9]{50}'),
            'user_id' => User::factory(),
        ];
    }
}
