<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('carritos', function (Blueprint $coleccion) {
            // Relación con clientes (colección clientes en MongoDB)
            $coleccion->string('cliente_id')->nullable()->comment('ID de cliente registrado');
            // Datos del carrito
            $coleccion->json('productos')->nullable()->comment('Array de productos con id, nombre, cantidad y precio');
            $coleccion->decimal('total', 10, 2)->default(0)->comment('Total calculado del carrito');
            // Timestamps
            $coleccion->timestamps();
            $coleccion->index('cliente_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carritos');
    }
};