<?php

namespace Database\Seeders;

use App\Models\ProductoHasPedido;
use Illuminate\Database\Seeder;

class ProductoHasPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductoHasPedido::factory()->count(5)->create();
    }
}
