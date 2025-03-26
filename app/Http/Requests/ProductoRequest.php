<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre'       => 'required|string|max:255',
            'descripcion'  => 'required|string',
            'precio'       => 'required|numeric',
            'cantidad'     => 'required|integer',
            'categoria'    => 'required|string|max:255',
            'foto'         => 'nullable|image|max:2048', // opcional, imagen y máximo 2MB
        ];
    }
}
