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
            'user_id' => 'nullable|exists:users,id',
            'cliente_id' => 'nullable|exists:clientes,_id',
            'productos' => 'required|array',
            'productos.*.id' => 'required',
            'productos.*.quantity' => 'required|integer|min:1'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!$this->user_id && !$this->cliente_id) {
                $validator->errors()->add('base', 'Debe asignar el carrito a un usuario o cliente');
            }
        });
    }

}
