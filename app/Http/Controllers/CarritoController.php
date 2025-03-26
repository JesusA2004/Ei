<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CarritoRequest;
use Illuminate\Support\Facades\Auth;
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
        $carritos = Carrito::with(['user', 'cliente'])->paginate();

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
        $currentUser = Auth::user();

        return view('carrito.create', [
            'carrito' => new Carrito(),
            'productos' => Producto::all(),
            'clientes' => Cliente::all(),
            'users' => User::all(),
            'isAdmin' => $currentUser instanceof User // Verifica si es usuario admin
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarritoRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $currentUser = Auth::user();

        // Asignar relación según tipo de usuario
        if ($currentUser instanceof User) { // Usuario admin
            $data['user_id'] = $currentUser->id;
        } else { // Cliente
            $data['cliente_id'] = $currentUser->id;
        }

        // Convertir productos a formato correcto
        $data['productos'] = $this->formatProducts($data['productos']);
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
        $carrito = Carrito::with(['user', 'cliente', 'productos'])->findOrFail($id);

        return view('carrito.show', compact('carrito'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $carrito = Carrito::findOrFail($id);
        $currentUser = Auth::user();

        return view('carrito.edit', [
            'carrito' => $carrito,
            'productos' => Producto::all(),
            'clientes' => Cliente::all(),
            'users' => User::all(),
            'isAdmin' => $currentUser instanceof User
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarritoRequest $request, Carrito $carrito): RedirectResponse
    {
        $data = $request->validated();
        $currentUser = Auth::user();

        // Mantener la relación original si no se cambia
        if (!isset($data['user_id']) && !isset($data['cliente_id'])) {
            if ($currentUser instanceof User) {
                $data['user_id'] = $currentUser->id;
            } else {
                $data['cliente_id'] = $currentUser->id;
            }
        }

        // Actualizar productos y total
        $data['productos'] = $this->formatProducts($data['productos'] ?? []);
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
     * Formatear productos para almacenamiento
     */
    protected function formatProducts(array $products): array
    {
        return array_map(function ($product) {
            return [
                'id_producto' => new ObjectId($product['id']),
                'nombre' => $product['name'],
                'precio_unitario' => (float) $product['price'],
                'cantidad' => (int) $product['quantity']
            ];
        }, $products);
    }

    /**
     * Calcular total del carrito
     */
    protected function calculateTotal(array $products): float
    {
        return array_reduce($products, function ($total, $product) {
            return $total + ($product['precio_unitario'] * $product['cantidad']);
        }, 0);
    }
}
