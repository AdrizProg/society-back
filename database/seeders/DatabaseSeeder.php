<?php

namespace Database\Seeders;

use App\Models\Asociacion;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'admin' => true,
        ]);

        Asociacion::query()->delete();
        Asociacion::factory(10)->create();
    }
}
