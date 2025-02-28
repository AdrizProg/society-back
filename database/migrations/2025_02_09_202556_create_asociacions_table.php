<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asociacions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('descripcion', 255)->nullable();
            $table->char('cif', 9)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->enum('tipo', ['Deportiva', 'Cultural', 'Vecinos', 'Consumidores y Usuarios', 'Ayuda Mutua', 'Voluntariado', 'Medioambientales', 'Educativas']);
            $table->string('imagenPrincipal', 255)->nullable()->default("https://www.facebook.com/images/groups/groups-default-cover-photo-2x.png");
            $table->string('logo', 255)->nullable()->default("https://static-cse.canva.com/blob/1810075/1600w-HdnNPtnguw4.ab2a7a1e.jpg");
            $table->boolean('aprobados')->default(false);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asociacions');
    }
};
