<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProductoController extends Controller
{

    public function index(Request $request): View
    {
        $productos = Producto::paginate(20);

        return view('producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $producto = new Producto();

        return view('producto.create', compact('producto'));
    }

    public function store   (ProductoRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            // Guarda el archivo en storage/app/public/productos
            $file->storeAs('public/productos', $filename);
            // Solo se almacena el nombre del archivo en MongoDB
            $data['foto'] = $filename;
        }

        Producto::create($data);

        return Redirect::route('productos.index')
            ->with('success', 'Producto agregado correctamente.');
    }


    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    public function update(ProductoRequest $request, Producto $producto): RedirectResponse
    {
        $data = $request->validated();

        // Si se envía una nueva foto, se procesa:
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Guarda la nueva foto en storage/app/public/productos
            $file->storeAs('public/productos', $filename);

            // (Opcional) Elimina la imagen antigua si existiera y ya no es necesaria:
            if ($producto->foto) {
                \Storage::delete('public/productos/' . $producto->foto);
            }

            // Actualiza el dato 'foto' con el nuevo nombre de archivo
            $data['foto'] = $filename;
        }

        // Actualiza el producto con los datos (incluyendo la nueva foto si se envió)
        $producto->update($data);

        return Redirect::route('productos.index')
            ->with('success', 'Producto actualizado correctamente');
    }

}
