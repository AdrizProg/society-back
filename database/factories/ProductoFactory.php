<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asociacion;
use App\Models\Producto;

class ProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name('[A-Za-z]{20}'),
            'descripcion' => fake()->text(200),
            'precio' => fake()->randomFloat(2, 0, 10000),
            'stock' => fake()->numberBetween(0, 10000),
            'isRopa' => fake()->boolean(),
            'asociacion_id' => Asociacion::factory(),
        ];
    }
}
