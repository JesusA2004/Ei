@extends('layouts.barraL')

@section('template_title')
    {{ $producto->nombre ?? __('Show') . " " . __('Producto') }}
@endsection

@section('panel-content')
    <section class="content container-fluid">
        <div class="row p-3">
            <div class="col-12 col-md-10 col-lg-10 mx-auto">
                <div class="card shadow-sm" style="border: 1px solid #97ACBA;">
                    <!-- Encabezado consistente con botones y colores -->
                    <div class="card-header d-flex justify-content-between align-items-center" 
                         style="background-color: #FFF9F0; border: 1px solid #97ACBA;">
                        <h5 class="card-title mb-0" style="color: #404E5E; font-weight: bold;">{{ __('Mostrar') }} Producto</h5>
                        <a class="btn btn-sm" 
                           style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;" 
                           href="{{ route('productos.index') }}">
                            {{ __('Regresar') }}
                        </a>
                    </div>
                    <div class="card-body" style="background-color: #FFF9F0;">
                        <div class="row mb-2">
                            <div class="col-md-4 text-end" style="color: #404E5E; font-weight: bold;">
                                Nombre:
                            </div>
                            <div class="col-md-8">
                                {{ $producto->nombre }}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 text-end" style="color: #404E5E; font-weight: bold;">
                                Descripción:
                            </div>
                            <div class="col-md-8">
                                {{ $producto->descripcion }}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 text-end" style="color: #404E5E; font-weight: bold;">
                                Precio:
                            </div>
                            <div class="col-md-8">
                                ${{ number_format($producto->precio, 2) }}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 text-end" style="color: #404E5E; font-weight: bold;">
                                Cantidad:
                            </div>
                            <div class="col-md-8">
                                {{ $producto->cantidad }}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4 text-end" style="color: #404E5E; font-weight: bold;">
                                Categoría:
                            </div>
                            <div class="col-md-8">
                                {{ $producto->categoria }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 text-end" style="color: #404E5E; font-weight: bold;">
                                Foto:
                            </div>
                            <div class="col-md-8">
                                @if($producto->foto)
                                    <img src="{{ asset('storage/productos/' . $producto->foto) }}" alt="{{ $producto->nombre }}" style="max-width:200px;" class="img-thumbnail">
                                @else
                                    N/A
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
