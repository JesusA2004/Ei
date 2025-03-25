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
        Schema::create('clientes', function (Blueprint $coleccion) {
            $coleccion->string('nombre');
            $coleccion->string('apellido');
            $coleccion->string('correo')->unique(); // Esto ya crea el índice
            $coleccion->string('telefono')->nullable();
            $coleccion->text('direccion');
            $coleccion->string('id_usuario')->nullable();
            $coleccion->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
