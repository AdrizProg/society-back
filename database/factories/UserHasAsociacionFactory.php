<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Asociacion;
use App\Models\User;
use App\Models\UserHasAsociacion;

class UserHasAsociacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserHasAsociacion::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'asociacion_id' => Asociacion::factory(),
            'user_id' => User::factory(),
        ];
    }
}
