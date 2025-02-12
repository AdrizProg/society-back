<?php

namespace Database\Seeders;

use App\Models\RopaTipoProducto;
use Illuminate\Database\Seeder;

class RopaTipoProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RopaTipoProducto::factory()->count(5)->create();
    }
}
