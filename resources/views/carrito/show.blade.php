@extends('layouts.barraL')

@section('template_title')
    {{ $carrito->cliente_id ? __('Detalles del Carrito') : __('Carrito') }}
@endsection

@section('panel-content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="border: 1px solid #97ACBA;">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #FFF9F0;">
                    <h5 class="card-title" style="color: #404E5E; font-weight: 600;">{{ __('Detalles del Carrito') }}</h5>
                    <a class="btn btn-sm" 
                       style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;"
                       href="{{ route('carritos.index') }}"> 
                        {{ __('Volver') }}
                    </a>
                </div>
                <div class="card-body" style="background-color: #FFF9F0;">
                    <div class="mb-3">
                        <strong style="color: #404E5E;">Cliente:</strong>
                        @if($carrito->cliente_id)
                            @php $cliente = App\Models\Cliente::find($carrito->cliente_id) @endphp
                            @if($cliente)
                                <span style="color: #404E5E;">{{ $cliente->nombre }} {{ $cliente->apellido }}</span>
                            @else
                                <span class="text-danger">Cliente no encontrado</span>
                            @endif
                        @else
                            <span class="text-muted">No asociado a cliente</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <strong style="color: #404E5E;">Productos:</strong>
                        @if($carrito->productos && is_string($carrito->productos))
                            @php $productos = json_decode($carrito->productos, true) @endphp
                            <div class="row mt-3">
                                @foreach($productos as $producto)
                                    @php
                                        $productoDB = App\Models\Producto::find($producto['id_producto']);
                                    @endphp
                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100" style="border: 1px solid #97ACBA;">
                                            <div class="row g-0">
                                                <div class="col-4">
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
                                                <div class="col-8">
                                                    <div class="card-body">
                                                        <h5 class="card-title" style="color: #404E5E;">
                                                            @if($productoDB)
                                                                {{ $productoDB->nombre }}
                                                            @else
                                                                <span class="text-danger">Producto eliminado</span>
                                                            @endif
                                                        </h5>
                                                        <ul class="list-unstyled" style="color: #404E5E;">
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
                        <h4 class="text-end" style="color: #404E5E;">
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
