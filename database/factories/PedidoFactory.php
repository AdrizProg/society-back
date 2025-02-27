<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Pedido;
use App\Models\User;

class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'estado' => fake()->randomElement(["carrito","enProceso","tramitado"]),
            'fechaEntregado' => fake()->date(),
            'user_id' => User::factory(),
        ];
    }
}
