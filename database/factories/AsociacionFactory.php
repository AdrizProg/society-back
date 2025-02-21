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
            'nombre' => fake()->name('[A-Za-z]{20}'),
            'cif' => fake()->regexify('^[G]{1}[0-9]{8}'),
            'direccion' => fake()->address(),
            'descripcion' => fake()->text(200),
            'tipo' => fake()->randomElement(['Deportiva','Cultural','Vecinos','Consumidores y Usuarios','Ayuda Mutua','Voluntariado','Medioambientales','Educativas']),
            'user_id' => User::factory(),
        ];
    }
}