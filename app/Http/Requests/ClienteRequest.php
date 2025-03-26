<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado a realizar esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Define las reglas de validación que se aplican a la solicitud.
     */
    public function rules(): array
    {
        // Si usas el mismo request para almacenar y actualizar, podrías ajustar la regla unique en 'correo'
        return [
            'nombre'    => 'required|string|max:255',
            'apellido'  => 'required|string|max:255',
            'correo'    => 'required|email|unique:clientes,correo,' . $this->route('cliente'),
            'telefono'  => 'nullable|string|max:255',
            'direccion' => 'required|string',
            'id_usuario'=> 'nullable|string|max:255',
        ];
    }
}
