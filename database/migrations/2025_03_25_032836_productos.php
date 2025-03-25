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
        Schema::create('productos', function (Blueprint $coleccion) {
            $coleccion->string('nombre');
            $coleccion->text('descripcion');
            $coleccion->decimal('precio', 8, 2);
            $coleccion->integer('cantidad');
            $coleccion->string('categoria');
            
            $coleccion->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
