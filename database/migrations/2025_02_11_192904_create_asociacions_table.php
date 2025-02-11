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

        Schema::create('asociacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->string('nif');
            $table->string('direccion', 100);
            $table->string('descripcion', 200)->nullable();
            $table->string('imagen', 50)->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asociacions');
    }
};
