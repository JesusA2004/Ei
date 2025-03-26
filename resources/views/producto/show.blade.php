@extends('layouts.app')

@section('template_title')
    {{ $producto->nombre ?? __('Show') . " " . __('Producto') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row padding-1 p-1">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} {{ $producto->nombre }}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('productos.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>{{ __('Nombre') }}:</strong> {{ $producto->nombre }}
                            </div>
                            <div class="col-md-6">
                                <strong>{{ __('Precio') }}:</strong> {{ $producto->precio }}
                            </div>
                            <div class="col-md-6 mt-2">
                                <strong>{{ __('Cantidad') }}:</strong> {{ $producto->cantidad }}
                            </div>
                            <div class="col-md-6 mt-2">
                                <strong>{{ __('Categoria') }}:</strong> {{ $producto->categoria }}
                            </div>
                            <div class="col-md-6 mt-2">
                                <strong>{{ __('Descripción') }}:</strong> {{ $producto->descripcion }}
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <a class="btn btn-success btn-sm" href="{{ route('productos.edit', $producto->id) }}">
                                <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                            </a>
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?');">
                                    <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
