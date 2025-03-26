@extends('layouts.app')

@section('template_title')
    {{ $cliente->nombre ?? __('Show') . " " . __('Cliente') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Cliente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('clientes.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="mb-3">
                            <strong>Nombre:</strong> {{ $cliente->nombre }}
                        </div>
                        <div class="mb-3">
                            <strong>Apellido:</strong> {{ $cliente->apellido }}
                        </div>
                        <div class="mb-3">
                            <strong>Correo:</strong> {{ $cliente->correo }}
                        </div>
                        <div class="mb-3">
                            <strong>Teléfono:</strong> {{ $cliente->telefono }}
                        </div>
                        <div class="mb-3">
                            <strong>Dirección:</strong> {{ $cliente->direccion }}
                        </div>
                        <div class="mb-3">
                            <strong>ID Usuario:</strong> {{ $cliente->id_usuario }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
