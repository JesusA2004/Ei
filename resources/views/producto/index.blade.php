@extends('layouts.barraL')

@section('template_title')
    Productos
@endsection

@section('panel-content')
    <div class="container-fluid">
        <div class="row padding-1 p-1">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">{{ __('Productos') }}</span>
                            <div class="float-right">
                                <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm">
                                    {{ __('Añadir producto') }}
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
                                        <th>Foto</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Categoría</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $index => $producto)
                                        <tr>
                                            <td>
                                                @if($producto->foto)
                                                    <img src="{{ asset('storage/productos/' . $producto->foto) }}" alt="{{ $producto->nombre }}" style="max-width: 80px;">
                                                @else
                                                    Sin productos en inventario
                                                @endif
                                            </td>
                                            <td>{{ $producto->nombre }}</td>
                                            <td>{{ $producto->descripcion }}</td>
                                            <td>{{ $producto->precio }}</td>
                                            <td>{{ $producto->cantidad }}</td>
                                            <td>{{ $producto->categoria }}</td>
                                            <td>
                                                <form action="{{ route('productos.destroy', $producto->_id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('productos.show', $producto->_id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('productos.edit', $producto->_id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este producto?');">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
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
                {!! $productos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
