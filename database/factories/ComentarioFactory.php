<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Comentario;
use App\Models\Producto;
use App\Models\User;

class ComentarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comentario::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'text' => fake()->text(250),
            'valoracion' => fake()->randomElement(["1","2","3","4","5"]),
            'producto_id' => Producto::factory(),
            'user_id' => User::factory(),
        ];
    }
}
