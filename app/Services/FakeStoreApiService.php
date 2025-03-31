<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FakeStoreApiService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.fakestoreapi.base_url');
    }

    // Obtener todos los productos
    public function getAllProducts()
    {
        $response = Http::get("{$this->baseUrl}/products");
        return $response->successful() ? $response->json() : null;
    }

    // Obtener un producto por ID
    public function getProductById(int $id)
    {
        $response = Http::get("{$this->baseUrl}/products/{$id}");
        return $response->successful() ? $response->json() : null;
    }

    // Crear un nuevo producto
    public function createProduct(array $data)
    {
        $response = Http::post("{$this->baseUrl}/products", $data);
        return $response->successful() ? $response->json() : null;
    }

    // Actualizar un producto existente
    public function updateProduct(int $id, array $data)
    {
        $response = Http::put("{$this->baseUrl}/products/{$id}", $data);
        return $response->successful() ? $response->json() : null;
    }

    // Eliminar un producto
    public function deleteProduct(int $id)
    {
        $response = Http::delete("{$this->baseUrl}/products/{$id}");
        return $response->successful() ? $response->json() : null;
    }
}
