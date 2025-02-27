<?php

namespace Database\Seeders;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create()->each(function ($user) {
            // Crear 10 pedidos para cada usuario
            Pedido::factory()->count(10)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
