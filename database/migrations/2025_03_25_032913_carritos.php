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
        Schema::create('carritos', function (Blueprint $coleccion) {
            // Identificador de la sesión del cliente
            $coleccion->string('sesion_id')->nullable();
            $coleccion->index('cliente_id');

            // Arreglo de productos en el carrito (cada objeto puede tener: id_producto, nombre, cantidad y precio_unitario)
            $coleccion->json('productos')->nullable();
            
            // Total del carrito (opcional, para cálculos rápidos)
            $coleccion->decimal('total', 8, 2)->default(0);
            
            $coleccion->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carritos');
    }
};
