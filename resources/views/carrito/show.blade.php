@extends('layouts.barraL')

@section('template_title')
    {{ $carrito->cliente_id ? __('Detalles del Carrito') : __('Carrito') }}
@endsection

@section('panel-content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border border-secondary">
                <div class="card-header d-flex justify-content-between align-items-center bg-light">
                    <h5 class="mb-0 text-dark">{{ __('Detalles del Carrito') }}</h5>
                    <a class="btn btn-sm btn-primary" href="{{ route('carritos.index') }}">
                        {{ __('Volver') }}
                    </a>
                </div>
                <div class="card-body bg-white">
                    
                    {{-- Cliente --}}
                    <div class="mb-4">
                        <strong class="text-dark">Cliente:</strong>
                        @php $cliente = $carrito->cliente_id ? App\Models\Cliente::find($carrito->cliente_id) : null; @endphp
                        @if($cliente)
                            <span class="text-dark">{{ $cliente->nombre }} {{ $cliente->apellido }}</span>
                        @elseif($carrito->cliente_id)
                            <span class="text-danger">Cliente no encontrado</span>
                        @else
                            <span class="text-muted">No asociado a cliente</span>
                        @endif
                    </div>

                    {{-- Productos --}}
                    <div class="mb-4">
                        <strong class="text-dark">Productos:</strong>
                        @php
                            $productos = is_string($carrito->productos) ? json_decode($carrito->productos, true) : [];
                        @endphp

                        @if(!empty($productos))
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-2">
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
                                                     class="card-img-top"
                                                     alt="{{ $productoDB->nombre }}"
                                                     style="height: 180px; object-fit: cover;">
                                            @else
                                                <div class="bg-secondary text-white text-center d-flex align-items-center justify-content-center" style="height: 180px;">
                                                    Sin imagen
                                                </div>
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title text-dark">
                                                    {{ $productoDB ? $productoDB->nombre : 'Producto eliminado' }}
                                                </h5>
                                                <ul class="list-unstyled text-dark">
                                                    <li><strong>Cantidad:</strong> {{ $cantidad }}</li>
                                                    <li><strong>Precio unitario:</strong> ${{ number_format($precio, 2) }}</li>
                                                    <li><strong>Subtotal:</strong> ${{ number_format($subtotal, 2) }}</li>
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
                        <h4 class="text-end text-dark">
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
