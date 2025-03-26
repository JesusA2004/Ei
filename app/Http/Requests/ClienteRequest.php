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

    public function rules(): array
    {
         // Para la edición, se asume que el parámetro "cliente" contiene el ID del registro actual
         $clienteId = $this->cliente ? $this->cliente->id : null;

        return [
            'nombre'     => 'required|string|max:255',
            'apellido'   => 'required|string|max:255',
            'correo'     => 'required|email|unique:clientes,correo,' . $clienteId,
            'telefono'   => 'nullable|string|max:20',
            'direccion'  => 'required|string',
            'usuario'    => 'required|string|max:255|unique:clientes,usuario,' . $clienteId,
            'contrasena' => 'required|string|min:6',
        ];
    }
}
