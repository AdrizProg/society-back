<?php

namespace Database\Seeders;

use App\Models\Asociacion;
use Illuminate\Database\Seeder;

class AsociacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asociacion::factory()->count(5)->create();
    }
}
