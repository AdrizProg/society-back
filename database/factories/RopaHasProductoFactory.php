<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Producto;
use App\Models\RopaHasProducto;
use App\Models\RopaTipoProduct;
use App\Models\RopaTipoProducto;

class RopaHasProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RopaHasProducto::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'producto_id' => Producto::factory(),
            'ropaTipoProducto_id' => RopaTipoProduct::factory(),
            'cantidad' => fake()->numberBetween(-10000, 10000),
            'ropa_tipo_producto_id' => RopaTipoProducto::factory(),
        ];
    }
}
