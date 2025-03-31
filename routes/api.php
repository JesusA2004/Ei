<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Ruta para obtener el usuario autenticado (utilizando Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para consumir la FakeStoreAPI (ejemplo para productos)
Route::prefix('fakestore')->group(function () {
    // Obtener todos los productos
    Route::get('products', [ProductController::class, 'index']);
    
    // Obtener un producto por ID
    Route::get('products/{id}', [ProductController::class, 'show']);
    
    // Crear un nuevo producto
    Route::post('products', [ProductController::class, 'store']);
    
    // Actualizar un producto existente
    Route::put('products/{id}', [ProductController::class, 'update']);
    
    // Eliminar un producto
    Route::delete('products/{id}', [ProductController::class, 'destroy']);
});
