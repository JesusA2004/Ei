<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('productos', function (Blueprint $coleccion) {
            $coleccion->string('nombre');
            $coleccion->text('descripcion');
            $coleccion->decimal('precio', 8, 2);
            $coleccion->integer('cantidad');
            $coleccion->string('categoria');
            $coleccion->string('foto')->nullable(); // Nombre del archivo de la imagen
            $coleccion->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
