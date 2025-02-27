<?php

namespace Database\Seeders;

use App\Models\CategoriaHasProducto;
use Illuminate\Database\Seeder;

class CategoriaHasProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriaHasProducto::factory()->count(5)->create();
    }
}
