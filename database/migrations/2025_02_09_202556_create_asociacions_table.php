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
            $table->char('cif', 9);
            $table->string('direccion', 255);
            $table->enum('Tipo', ['Deportiva','Cultural','Vecinos','ConsumidoresYUsuarios','AyudaMutua','Voluntariado','Medioambientales','Educativas']);
            $table->string('imagen', 255)->nullable()->default("https://www.hemomadrid.com/wp-content/uploads/2015/09/imagen-vacia.jpg");
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
