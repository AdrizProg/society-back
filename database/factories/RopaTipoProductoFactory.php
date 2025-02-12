<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\RopaTipoProducto;

class RopaTipoProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RopaTipoProducto::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'tallas' => fake()->randomElement(["xxs","xs","s","m","l","xl","xxl","xxxl"]),
            'color' => fake()->randomElement(["blanco","negro","azul","morado","rojo","amarillo","naranja","gris","verde","marron","lila","multicolor"]),
        ];
    }
}
