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
            'sesion_id'  => 'nullable|string|max:255',
            'cliente_id' => 'nullable|string|max:255',
            // Se espera que "productos" llegue en formato JSON, si se utiliza de otra forma, se puede ajustar.
            'productos'  => 'nullable|json',
            'total'      => 'nullable|numeric',
        ];
    }
}
