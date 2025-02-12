<?php

namespace Database\Seeders;

use App\Models\RopaHasProducto;
use Illuminate\Database\Seeder;

class RopaHasProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RopaHasProducto::factory()->count(5)->create();
    }
}
