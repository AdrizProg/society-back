<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('ropa_tipo_productos', function (Blueprint $table) {
            $table->id();
            $table->enum('tallas', ["xxs","xs","s","m","l","xl","xxl","xxxl"]);
            $table->enum('color', ["blanco","negro","azul","morado","rojo","amarillo","naranja","gris","verde","marron","lila","multicolor"]);
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ropa_tipo_productos');
    }
};
