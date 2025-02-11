<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\ProductoHasPedido;

class ProductoHasPedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductoHasPedido::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'producto_id' => Producto::factory(),
            'pedido_id' => Pedido::factory(),
        ];
    }
}
