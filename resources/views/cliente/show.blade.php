@extends('layouts.barraL')

@section('template_title')
    {{ $cliente->nombre ?? __('Show') . " " . __('Cliente') }}
@endsection

@section('panel-content')
    <section class="content container-fluid">
        <div class="row padding-1 p-1">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <span class="card-title">{{ __('Show') }} Cliente</span>
                        <a class="btn btn-primary btn-sm" href="{{ route('clientes.index') }}">
                            {{ __('Back') }}
                        </a>
                    </div>
                    <div class="card-body bg-white">
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $cliente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $cliente->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $cliente->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Teléfono:</strong>
                            {{ $cliente->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Dirección:</strong>
                            {{ $cliente->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $cliente->usuario }}
                        </div>
                        <!-- Por seguridad, usualmente no se muestra la contraseña -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
