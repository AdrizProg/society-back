<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CategoriaHasProducto;
use App\Models\Producto;

class CategoriaHasProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoriaHasProducto::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'producto_id' => Producto::factory(),
            'categoria_id' => Categoria::factory(),
        ];
    }
}
