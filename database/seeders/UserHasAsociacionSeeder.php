<?php

namespace Database\Seeders;

use App\Models\UserHasAsociacion;
use Illuminate\Database\Seeder;

class UserHasAsociacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserHasAsociacion::factory()->count(5)->create();
    }
}
