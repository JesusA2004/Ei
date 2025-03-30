@extends('layouts.barraL')

@section('template_title')
    Clientes
@endsection

@section('panel-content')

    <div class="container-fluid">
        <div class="row padding-1 p-1">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display:flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">{{ __('Clientes') }}</span>
                            <div class="float-right">
                                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm">
                                    {{ __('Registrar Cliente') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo</th>
                                        <th>Usuario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $index => $cliente)
                                        <tr>
                                            <td>{{ $cliente->nombre }}</td>
                                            <td>{{ $cliente->apellido }}</td>
                                            <td>{{ $cliente->correo }}</td>
                                            <td>{{ $cliente->usuario }}</td>
                                            <td>
                                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('clientes.show', $cliente->id) }}">{{ __('Mostrar') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('clientes.edit', $cliente->id) }}">{{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este cliente?');">
                                                        {{ __('Eliminar') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $clientes->links() !!}
            </div>
        </div>
    </div>
@endsection

<script src="{{ asset('js/scripts.js') }}"></script>
