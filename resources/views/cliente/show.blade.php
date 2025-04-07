@extends('layouts.barraL')

@section('panel-content')
    <section class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-12">
                <div class="card shadow-sm" style="border-color: #97ACBA;">
                    <div class="card-header d-flex justify-content-between align-items-center" 
                         style="background-color: #5D8EC6; color: #ffffff;">
                        <h5 class="card-title mb-0">{{ __('Datos del cliente') }}</h5>
                        <a class="btn btn-sm" 
                           style="background-color: #DFD3CC; color: #404E5E; border: 1px solid #97ACBA;" 
                           href="{{ route('clientes.index') }}">
                            {{ __('Regresar') }}
                        </a>
                    </div>
                    <div class="card-body" style="background-color: #FFF9F0;">
                        <!-- Nombre -->
                        <div class="row mb-2">
                            <div class="col-sm-12 d-flex align-items-center">
                                <img src="https://img.icons8.com/color/24/user.png" alt="Nombre" class="me-2">
                                <strong class="me-1" style="color: #404E5E;">Nombre:</strong>
                                <span>{{ $cliente->nombre }}</span>
                            </div>
                        </div>

                        <!-- Apellido -->
                        <div class="row mb-2">
                            <div class="col-sm-12 d-flex align-items-center">
                                <img src="https://img.icons8.com/color/24/name.png" alt="Apellido" class="me-2">
                                <strong class="me-1" style="color: #404E5E;">Apellido:</strong>
                                <span>{{ $cliente->apellido }}</span>
                            </div>
                        </div>

                        <!-- Correo -->
                        <div class="row mb-2">
                            <div class="col-sm-12 d-flex align-items-center">
                                <img src="https://img.icons8.com/color/24/new-post.png" alt="Correo" class="me-2">
                                <strong class="me-1" style="color: #404E5E;">Correo:</strong>
                                <span>{{ $cliente->correo }}</span>
                            </div>
                        </div>

                        <!-- Teléfono -->
                        <div class="row mb-2">
                            <div class="col-sm-12 d-flex align-items-center">
                                <img src="https://img.icons8.com/color/24/phone.png" alt="Teléfono" class="me-2">
                                <strong class="me-1" style="color: #404E5E;">Teléfono:</strong>
                                <span>{{ $cliente->telefono }}</span>
                            </div>
                        </div>

                        <!-- Dirección -->
                        <div class="row mb-2">
                            <div class="col-sm-12 d-flex align-items-center">
                                <img src="https://img.icons8.com/color/24/marker.png" alt="Dirección" class="me-2">
                                <strong class="me-1" style="color: #404E5E;">Dirección:</strong>
                                <span>{{ $cliente->direccion }}</span>
                            </div>
                        </div>

                        <!-- Usuario -->
                        <div class="row">
                            <div class="col-sm-12 d-flex align-items-center">
                                <img src="https://img.icons8.com/color/24/administrator-male.png" alt="Usuario" class="me-2">
                                <strong class="me-1" style="color: #404E5E;">Usuario:</strong>
                                <span>{{ $cliente->usuario }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
