@extends('layouts.barraL')

@section('template_title')
    {{ $producto->nombre ?? __('Show') . " " . __('Producto') }}
@endsection

@section('panel-content')
    <section class="content container-fluid">
        <div class="row p-3">
            <div class="col-12 col-md-10 col-lg-8 mx-auto">
                <div class="card shadow-sm" style="border: 1px solid #97ACBA;">
                    <!-- Encabezado -->
                    <div class="card-header d-flex flex-column flex-md-row justify-content-between align-items-center" 
                         style="background-color: #FFF9F0; border-bottom: 1px solid #97ACBA; padding: 1rem 1.5rem;">
                        <h5 class="card-title mb-3 mb-md-0" style="color: #404E5E; font-weight: 600; font-size: 1.25rem;">
                            {{ __('Mostrar') }} Producto
                        </h5>
                        <a class="btn btn-sm" 
                           style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6; padding: 0.375rem 0.75rem;" 
                           href="{{ route('productos.index') }}">
                            {{ __('Regresar') }}
                        </a>
                    </div>

                    <!-- Cuerpo del card -->
                    <div class="card-body" style="background-color: #FFF9F0; padding: 1.5rem;">
                        <!-- Grupo de campos responsivos -->
                        <div class="d-flex flex-column gap-3">
                            <!-- Nombre -->
                            <div class="d-flex flex-column flex-md-row align-items-start">
                                <div class="flex-shrink-0 me-md-4" style="width: 140px;">
                                    <span style="color: #404E5E; font-weight: 500;">Nombre:</span>
                                </div>
                                <div class="flex-grow-1 mt-1 mt-md-0">
                                    {{ $producto->nombre }}
                                </div>
                            </div>

                            <!-- Descripción -->
                            <div class="d-flex flex-column flex-md-row align-items-start">
                                <div class="flex-shrink-0 me-md-4" style="width: 140px;">
                                    <span style="color: #404E5E; font-weight: 500;">Descripción:</span>
                                </div>
                                <div class="flex-grow-1 mt-1 mt-md-0">
                                    {{ $producto->descripcion }}
                                </div>
                            </div>

                            <!-- Precio -->
                            <div class="d-flex flex-column flex-md-row align-items-start">
                                <div class="flex-shrink-0 me-md-4" style="width: 140px;">
                                    <span style="color: #404E5E; font-weight: 500;">Precio:</span>
                                </div>
                                <div class="flex-grow-1 mt-1 mt-md-0">
                                    ${{ number_format($producto->precio, 2) }}
                                </div>
                            </div>

                            <!-- Cantidad -->
                            <div class="d-flex flex-column flex-md-row align-items-start">
                                <div class="flex-shrink-0 me-md-4" style="width: 140px;">
                                    <span style="color: #404E5E; font-weight: 500;">Cantidad:</span>
                                </div>
                                <div class="flex-grow-1 mt-1 mt-md-0">
                                    {{ $producto->cantidad }}
                                </div>
                            </div>

                            <!-- Categoría -->
                            <div class="d-flex flex-column flex-md-row align-items-start">
                                <div class="flex-shrink-0 me-md-4" style="width: 140px;">
                                    <span style="color: #404E5E; font-weight: 500;">Categoría:</span>
                                </div>
                                <div class="flex-grow-1 mt-1 mt-md-0">
                                    {{ $producto->categoria }}
                                </div>
                            </div>

                            <!-- Foto -->
                            <div class="d-flex flex-column flex-md-row align-items-center">
                                <div class="flex-shrink-0 me-md-4" style="width: 140px;">
                                    <span style="color: #404E5E; font-weight: 500;">Foto:</span>
                                </div>
                                <div class="flex-grow-1 mt-1 mt-md-0">
                                    @if($producto->foto)
                                        <img src="{{ asset('storage/productos/' . $producto->foto) }}" 
                                             alt="{{ $producto->nombre }}" 
                                             style="max-width: 100%; height: auto; max-height: 300px;" 
                                             class="img-fluid rounded border">
                                    @else
                                        <span class="text-muted">N/A</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
