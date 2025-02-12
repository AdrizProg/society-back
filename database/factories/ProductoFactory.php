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
            'nombre' => fake()->regexify('[A-Za-z0-9]{50}'),
            'descripcion' => fake()->regexify('[A-Za-z0-9]{200}'),
            'precio' => fake()->randomFloat(2, 0, 999999.99),
            'stock' => fake()->numberBetween(-10000, 10000),
            'isRopa' => fake()->word(),
            'asociacion_id' => Asociacion::factory(),
        ];
    }
}
