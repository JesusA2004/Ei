<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('template');
});

Route::get('/login', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('productos', App\Http\Controllers\ProductoController::class)->middleware('auth');

Route::resource('clientes', App\Http\Controllers\ClienteController::class)->middleware('auth');

Route::resource('carritos', App\Http\Controllers\CarritoController::class)->middleware('auth');

Route::resource('pedidos', App\Http\Controllers\PedidoController::class)->middleware('auth');
