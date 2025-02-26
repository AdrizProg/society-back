<?php

namespace Database\Seeders;

use App\Models\Asociacion;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\CategoriaHasProductoFactory;
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

        $this->call([
            AsociacionSeeder::class,
            UserHasAsociacionSeeder::class,
            RopaTipoProductoSeeder::class,
            ProductoSeeder::class,
            RopaHasProductoSeeder::class,
            ImagenSeeder::class,
            CategoriaSeeder::class,
            CategoriaHasProductoSeeder::class,
            PedidoSeeder::class,
            ProductoHasPedidoSeeder::class,
            ComentarioSeeder::class
        ]);
    }
}
