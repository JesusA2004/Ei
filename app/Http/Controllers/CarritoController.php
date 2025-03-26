<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CarritoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $carritos = Carrito::paginate();

        return view('carrito.index', compact('carritos'))
            ->with('i', ($request->input('page', 1) - 1) * $carritos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $carrito = new Carrito();
        $productos = Producto::all();
        $clientes = Cliente::all();

        return view('carrito.create', compact('carrito', 'productos', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarritoRequest $request): RedirectResponse
    {
        Carrito::create([
            'sesion_id'  => Auth::id(),
            'cliente_id' => $request->input('cliente_id'), 
            'productos'  => $request->input('productos'),
            'total'      => $request->input('total', 0),
        ]);

        return Redirect::route('carritos.index')
            ->with('success', 'Carrito añadido correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $carrito = Carrito::find($id);

        return view('carrito.show', compact('carrito'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $carrito = Carrito::find($id);

        return view('carrito.edit', compact('carrito'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarritoRequest $request, Carrito $carrito): RedirectResponse
    {
        $carrito->update($request->validated());

        return Redirect::route('carritos.index')
            ->with('success', 'Carrito actualizado correctamente');
    }

    public function destroy($id): RedirectResponse
    {
        Carrito::find($id)->delete();

        return Redirect::route('carritos.index')
            ->with('success', 'Carrito eliminado correctamente');
    }
}
