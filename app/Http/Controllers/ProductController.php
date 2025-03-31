<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Services\FakeStoreApiService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $apiService;

    public function __construct(FakeStoreApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * Mostrar listado de productos.
     */
    public function index()
    {
        $products = collect($this->apiService->getAllProducts())->map(fn($product) => (object) $product);

        // Paginar manualmente los productos (ajusta el número de productos por página)
        $perPage = 6; 
        $currentPage = request()->input('page', 1);
        $currentItems = $products->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedProducts = new \Illuminate\Pagination\LengthAwarePaginator($currentItems, $products->count(), $perPage, $currentPage, [
            'path' => request()->url(),
            'query' => request()->query(),
        ]);

        return view('products.index', ['products' => $paginatedProducts]);
    }

    /**
     * Mostrar el formulario para crear un producto.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Almacenar un producto nuevo usando la API.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $product = $this->apiService->createProduct($data);

        return $product 
            ? redirect()->route('products.index')->with('success', 'Producto creado exitosamente.')
            : redirect()->back()->with('error', 'Error al crear el producto.');
    }

    /**
     * Mostrar los detalles de un producto.
     */
    public function show($id)
    {
        $product = $this->apiService->getProductById((int) $id);
        
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Producto no encontrado.');
        }

        // Convertimos a objeto si la API devuelve un array
        $product = is_array($product) ? (object) $product : $product;

        return view('products.show', compact('product'));
    }

    /**
     * Mostrar el formulario para editar un producto.
     */
    public function edit($id)
    {
        $product = $this->apiService->getProductById((int) $id);
        
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Producto no encontrado.');
        }

        $product = is_array($product) ? (object) $product : $product;

        return view('products.edit', compact('product'));
    }

    /**
     * Actualizar un producto existente usando la API.
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->validated();
        $product = $this->apiService->updateProduct((int) $id, $data);

        return $product 
            ? redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.')
            : redirect()->back()->with('error', 'Error al actualizar el producto.');
    }

    /**
     * Eliminar un producto.
     */
    public function destroy($id)
    {
        $result = $this->apiService->deleteProduct((int) $id);

        return $result
            ? redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.')
            : redirect()->route('products.index')->with('error', 'Error al eliminar el producto.');
    }
}
