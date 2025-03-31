<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
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

Route::resource('products', App\Http\Controllers\ProductController::class)->middleware('auth');
