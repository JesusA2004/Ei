@extends('layouts.barraL')

@section('template_title')
    {{ $carrito->cliente_id ? __('Detalles del Carrito') : __('Carrito') }}
@endsection

@section('panel-content')
<section class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-md-11 col-lg-12">
            <div class="card shadow-sm" style="border-color: #97ACBA;">
                <div class="card-header d-flex justify-content-between align-items-center" 
                     style="background-color: #5D8EC6; color: #ffffff;">
                    <h5 class="mb-0">{{ __('Detalles del Carrito') }}</h5>
                    <a class="btn btn-sm"
                       style="background-color: #DFD3CC; color: #404E5E; border: 1px solid #97ACBA;"
                       href="{{ route('carritos.index') }}">
                        {{ __('Regresar') }}
                    </a>
                </div>
                <div class="card-body" style="background-color: #FFF9F0;">
                    
                    {{-- Cliente --}}
                    <div class="mb-4">
                        <strong style="color: #404E5E;">Cliente:</strong>
                        @php 
                            $cliente = $carrito->cliente_id ? App\Models\Cliente::find($carrito->cliente_id) : null; 
                        @endphp
                        @if($cliente)
                            <span style="color: #404E5E;">{{ $cliente->nombre }} {{ $cliente->apellido }}</span>
                        @elseif($carrito->cliente_id)
                            <span class="text-danger">Cliente no encontrado</span>
                        @else
                            <span class="text-muted">No asociado a cliente</span>
                        @endif
                    </div>

                    {{-- Productos --}}
                    <div class="mb-4">
                        <strong style="color: #404E5E;">Productos:</strong>
                        @php
                            $productos = is_array($carrito->productos) 
                                ? $carrito->productos 
                                : json_decode($carrito->productos, true);
                        @endphp

                        @if(!empty($productos))
                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 mt-2">
                                @foreach($productos as $producto)
                                    @php
                                        $productoDB = App\Models\Producto::find($producto['id_producto']);
                                        $cantidad = $producto['cantidad'] ?? 0;
                                        $precio = $producto['precio_unitario'] ?? 0;
                                        $subtotal = $cantidad * $precio;
                                    @endphp
                                    <div class="col">
                                        <div class="card h-100 shadow-sm border border-light">
                                            @if($productoDB && $productoDB->foto)
                                                <img src="{{ asset('storage/productos/' . $productoDB->foto) }}"
                                                     class="card-img-top img-fluid rounded-top"
                                                     alt="{{ $productoDB->nombre }}"
                                                     style="height: 140px; object-fit: cover;">
                                            @else
                                                <div class="bg-secondary text-white text-center d-flex align-items-center justify-content-center rounded-top" style="height: 140px;">
                                                    Sin imagen
                                                </div>
                                            @endif
                                            <div class="card-body p-2" style="background-color: #F9EFE6;">
                                                <h6 class="card-title mb-1" style="color: #404E5E;">
                                                    {{ $productoDB ? $productoDB->nombre : 'Producto eliminado' }}
                                                </h6>
                                                <ul class="list-unstyled small mb-0" style="color: #404E5E;">
                                                    <li><strong>Cant:</strong> {{ $cantidad }}</li>
                                                    <li><strong>P.U.:</strong> ${{ number_format($precio, 2) }}</li>
                                                    <li><strong>Sub:</strong> ${{ number_format($subtotal, 2) }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted mt-2">No hay productos en este carrito</p>
                        @endif
                    </div>

                    {{-- Total --}}
                    <div class="border-top pt-3 mt-3">
                        <h5 class="text-end" style="color: #404E5E;">
                            <strong>Total General:</strong>
                            ${{ number_format($carrito->total, 2) }}
                        </h5>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
