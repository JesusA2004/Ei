<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\CarritoRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use MongoDB\BSON\ObjectId;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Se carga la relación con el cliente
        $carritos = Carrito::with('cliente')->paginate();
        
        return view('carrito.index', [
            'carritos' => $carritos,
            'i' => ($request->input('page', 1) - 1) * $carritos->perPage()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('carrito.create', [
            'carrito'   => new Carrito(),
            'productos' => Producto::all(),
            'clientes'  => Cliente::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarritoRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Decodificar el JSON recibido en 'productos'
        $productosDecoded = json_decode($data['productos'], true);
        if (!is_array($productosDecoded) || count($productosDecoded) === 0) {
            return redirect()->back()->withErrors(['productos' => 'Debe agregar al menos un producto al carrito.']);
        }
        
        // Convertir productos al formato correcto y calcular total
        $data['productos'] = $this->formatProducts($productosDecoded);
        $data['total'] = $this->calculateTotal($data['productos']);

        Carrito::create($data);

        return redirect()->route('carritos.index')
            ->with('success', 'Carrito creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $carrito = Carrito::with('cliente')->findOrFail($id);

        return view('carrito.show', compact('carrito'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $carrito = Carrito::findOrFail($id);

        return view('carrito.edit', [
            'carrito'   => $carrito,
            'productos' => Producto::all(),
            'clientes'  => Cliente::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarritoRequest $request, Carrito $carrito): RedirectResponse
    {
        $data = $request->validated();

        // Decodificar el JSON recibido en 'productos'
        $productosDecoded = json_decode($data['productos'], true);
        if (!is_array($productosDecoded) || count($productosDecoded) === 0) {
            return redirect()->back()->withErrors(['productos' => 'Debe agregar al menos un producto al carrito.']);
        }
        
        // Actualizar productos y recalcular total
        $data['productos'] = $this->formatProducts($productosDecoded);
        $data['total'] = $this->calculateTotal($data['productos']);

        $carrito->update($data);

        return redirect()->route('carritos.index')
            ->with('success', 'Carrito actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $carrito = Carrito::findOrFail($id);
        $carrito->delete();

        return redirect()->route('carritos.index')
            ->with('success', 'Carrito eliminado correctamente');
    }

    /**
     * Formatear productos para almacenamiento.
     *
     * Se espera que cada producto tenga:
     * - id_producto: el identificador del producto (cadena).
     * - nombre: el nombre del producto.
     * - precio_unitario: el precio unitario.
     * - cantidad: la cantidad elegida.
     */
    protected function formatProducts(array $products): array
    {
        return array_map(function ($product) {
            return [
                'id_producto'     => new ObjectId($product['id_producto']),
                'nombre'          => $product['nombre'],
                'precio_unitario' => (float) $product['precio_unitario'],
                'cantidad'        => (int) $product['cantidad']
            ];
        }, $products);
    }

    /**
     * Calcular total del carrito.
     */
    protected function calculateTotal(array $products): float
    {
        return array_reduce($products, function ($total, $product) {
            return $total + ($product['precio_unitario'] * $product['cantidad']);
        }, 0);
    }
}
