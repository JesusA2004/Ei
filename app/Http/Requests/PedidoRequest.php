<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cliente_id' => 'required|string|max:255',
            'total'      => 'required|numeric',
            'estado'     => 'required|string|max:255',
            // Los campos JSON se validan como string; podrías agregar validación adicional si lo requieres.
            'items'      => 'nullable|json',
            'envio'      => 'nullable|json',
            'pago'       => 'nullable|json',
        ];
    }
}
