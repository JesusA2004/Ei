{{-- Archivo principal (clientes.blade.php) --}}
@extends('layouts.barraL')

@section('template_title')
    Clientes
@endsection

@section('panel-content')

<div class="container-fluid px-4">
    <h1 class="mt-4 fw-bold clients-main-title">Clientes</h1>

    <div class="card clients-card shadow-sm">
        <!-- Header con colores específicos -->
        <div class="card-header clients-card-header d-flex justify-content-between align-items-center">
            <span class="header-title">Lista de Clientes</span>
            <a href="{{ route('clientes.create') }}" class="btn btn-new-client">
                <img src="https://img.icons8.com/ios/24/404E5E/plus-math.png" class="me-2" alt="Add">
                Agregar Cliente
            </a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert clients-alert m-4">
                <p class="mb-0">{{ $message }}</p>
            </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <table class="table clients-table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Usuario</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr class="clients-table-row">
                                <td>{{ $cliente->nombre }}</td>
                                <td>{{ $cliente->apellido }}</td>
                                <td>{{ $cliente->correo }}</td>
                                <td>{{ $cliente->usuario }}</td>
                                <td class="text-center">
                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline-flex gap-2 actions-form">
                                        <a href="{{ route('clientes.show', $cliente->id) }}" 
                                           class="btn btn-action btn-view" 
                                           title="Ver">
                                            <img src="https://img.icons8.com/ios/24/404E5E/visible.png" alt="Ver"/>
                                        </a>
                                        <a href="{{ route('clientes.edit', $cliente->id) }}" 
                                           class="btn btn-action btn-edit" 
                                           title="Editar">
                                            <img src="https://img.icons8.com/ios/24/404E5E/edit--v1.png" alt="Editar"/>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-action btn-delete" 
                                                title="Eliminar"
                                                onclick="return confirm('¿Estás seguro de eliminar este cliente?');">
                                            <img src="https://img.icons8.com/ios/24/404E5E/trash--v1.png" alt="Eliminar"/>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clients-footer">
            {!! $clientes->onEachSide(1)->links() !!}
        </div>
    </div>
</div>

@endsection

@push('css')
<link href="{{ asset('css/saras.css') }}" rel="stylesheet">
@endpush

@push('js')
<script src="{{ asset('js/scripts.js') }}"></script>
@endpush

