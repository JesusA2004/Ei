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
        Schema::create('pedidos', function (Blueprint $coleccion) {
            // Identificador del cliente que realiza el pedido
            $coleccion->string('cliente_id');
            $coleccion->index('cliente_id');
            
            // Total del pedido y estado ("Pendiente", "Completo", "Cancelado")
            $coleccion->decimal('total', 10, 2);
            $coleccion->string('estado');

            // Ítems del pedido embebidos (cada objeto: id_producto, cantidad y precio)
            $coleccion->json('items')->nullable();
            
            /* Subdocumento para envío
               - num_seguimiento: número de seguimiento del envío.
               - transportista: nombre de la empresa de transporte.
               - estado: estado del envío.
               - fecha_entrega: fecha estimada de entrega. */
            $coleccion->json('envio')->nullable();
            
            /* Subdocumento para pago
               - monto: monto pagado.
               - metodo: por ejemplo, "paypal", "tarjeta_credito", etc.
               - id_transaccion: identificador de la transacción.
               - estado: "Pendiente", "Completo" o "Fallida". */
            $coleccion->json('pago')->nullable();
            
            $coleccion->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
