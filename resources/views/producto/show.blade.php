@extends('layouts.barraL')

@section('template_title')
    {{ $producto->nombre ?? __('Show') . " " . __('Producto') }}
@endsection

@section('panel-content')
    <section class="content container-fluid">
        <div class="row padding-1 p-1">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <span class="card-title">{{ __('Mostrar') }} Producto</span>
                        <a class="btn btn-primary btn-sm" href="{{ route('productos.index') }}">
                            {{ __('Regresar') }}
                        </a>
                    </div>
                    <div class="card-body bg-white">
                        <div class="form-group">
                            <strong>Nombre:</strong> {{ $producto->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong> {{ $producto->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong> {{ $producto->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Categoría:</strong> {{ $producto->categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Foto:</strong>
                            @if($producto->foto)
                                <img src="{{ asset('storage/productos/' . $producto->foto) }}" alt="{{ $producto->nombre }}" style="max-width:200px;">
                            @else
                                N/A
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
