@extends('layouts.barraL')

@section('template_title')
    Editar Cliente
@endsection

@section('panel-content')
    <div class="container-fluid">
        <div class="row p-3">
            <div class="col-sm-12">
                <div class="card shadow-sm">
                    <!-- Encabezado con título y botón de regresar -->
                    <div class="card-header" style="background-color: #FFF9F0; border: 1px solid #97ACBA;">
                        <div class="d-flex justify-content-between align-items-center">
                            <span id="card_title" style="color: #404E5E; font-weight: bold;">{{ __('Editar Cliente') }}</span>
                            <div>
                                <a href="{{ route('clientes.index') }}" class="btn btn-sm" 
                                   style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;">
                                    {{ __('Regresar') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Cuerpo de la tarjeta: formulario -->
                    <div class="card-body" style="background-color: #FFF9F0; border: 1px solid #97ACBA;">
                        <form method="POST" action="{{ route('clientes.update', $cliente->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            @include('cliente.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
