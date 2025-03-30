@extends('layouts.barraL')

@section('template_title')
    {{ $carrito->cliente_id ? __('Detalles del Carrito') : __('Carrito') }}
@endsection

@section('panel-content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Detalles del Carrito') }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('carritos.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="mb-3">
                            <strong>Cliente:</strong>
                            @if($carrito->cliente_id)
                                @php $cliente = App\Models\Cliente::find($carrito->cliente_id) @endphp
                                @if($cliente)
                                    {{ $cliente->nombre }} {{ $cliente->apellido }}
                                @else
                                    <span class="text-danger">Cliente no encontrado</span>
                                @endif
                            @else
                                <span class="text-muted">No asociado a cliente</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <strong>Productos:</strong>
                            @if($carrito->productos && is_string($carrito->productos))
                                @php $productos = json_decode($carrito->productos, true) @endphp
                                <div class="row mt-3">
                                    @foreach($productos as $producto)
                                        @php
                                            $productoDB = App\Models\Producto::find($producto['id_producto']);
                                        @endphp
                                        <div class="col-md-4 mb-4">
                                            <div class="card h-100">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        @if($productoDB && $productoDB->foto)
                                                            <img src="{{ asset('storage/productos/' . $productoDB->foto) }}" 
                                                                 alt="{{ $productoDB->nombre }}" 
                                                                 class="img-fluid rounded-start"
                                                                 style="max-height: 120px; object-fit: cover;">
                                                        @else
                                                            <div class="bg-secondary d-flex align-items-center justify-content-center"
                                                                 style="height: 120px;">
                                                                <span class="text-white">Sin imagen</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">
                                                                @if($productoDB)
                                                                    {{ $productoDB->nombre }}
                                                                @else
                                                                    <span class="text-danger">Producto eliminado</span>
                                                                @endif
                                                            </h5>
                                                            <ul class="list-unstyled">
                                                                <li><strong>Cantidad:</strong> {{ $producto['cantidad'] ?? 0 }}</li>
                                                                <li><strong>Precio unitario:</strong> ${{ number_format($producto['precio_unitario'] ?? 0, 2) }}</li>
                                                                <li><strong>Subtotal:</strong> ${{ number_format(($producto['precio_unitario'] ?? 0) * ($producto['cantidad'] ?? 0), 2) }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted">No hay productos en este carrito</p>
                            @endif
                        </div>

                        <div class="mb-3 border-top pt-3">
                            <h4 class="text-end">
                                <strong>Total General:</strong> 
                                ${{ number_format($carrito->total, 2) }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection