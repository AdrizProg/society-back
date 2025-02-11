<?php

namespace Database\Seeders;

use App\Models\Imagen;
use Illuminate\Database\Seeder;

class ImagenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Imagen::factory()->count(5)->create();
    }
}
