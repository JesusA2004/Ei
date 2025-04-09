<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarritoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Se requiere que exista un cliente
            'cliente_id'    => 'required|exists:clientes,_id',
            // Se espera que 'productos' sea un string JSON no vacío
            'productos'     => 'required|string|min:1'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!$this->cliente_id) {
                $validator->errors()->add('base', 'Debe asignar el carrito a un cliente');
            }

            // Validar que el string en 'productos' se decodifique en un arreglo con al menos un producto.
            $productos = json_decode($this->input('productos'), true);
            if (!is_array($productos) || count($productos) === 0) {
                $validator->errors()->add('productos', 'Debe agregar al menos un producto al carrito.');
            }
        });
    }
}
