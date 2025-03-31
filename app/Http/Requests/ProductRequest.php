<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        // Puedes ajustar la autorización según tus necesidades
        return true;
    }

    public function rules()
    {
        return [
            // En el POST, no se envía el id; en el PUT, el id viene en la URL
            'title'       => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'category'    => 'nullable|string|max:255',
            'image'       => 'nullable|url',
        ];
    }
}
