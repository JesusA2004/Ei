@extends('layouts.barraL')

@section('template_title')
    Productos
@endsection

@section('panel-content')
    <div class="container-fluid">
        <div class="row p-3">
            <div class="col-sm-12">
                <div class="card shadow-sm">
                    <div class="card-header" style="background-color: #FFF9F0; border: 1px solid #97ACBA;">
                        <div class="d-flex justify-content-between align-items-center">
                            <span id="card_title" style="color: #404E5E; font-weight: bold;">{{ __('Productos') }}</span>
                            <div>
                                <a href="{{ route('productos.create') }}" class="btn btn-sm" style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;">
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
                    
                    <div class="card-body" style="background-color: #FFF9F0; border: 1px solid #97ACBA;">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr style="color: #404E5E;">
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
                                                    <img src="{{ asset('storage/productos/' . $producto->foto) }}" alt="{{ $producto->nombre }}" class="img-fluid" style="max-width: 80px;">
                                                @else
                                                    <span style="color: #404E5E;">Sin productos en inventario</span>
                                                @endif
                                            </td>
                                            <td>{{ $producto->nombre }}</td>
                                            <td>{{ $producto->descripcion }}</td>
                                            <td>{{ $producto->precio }}</td>
                                            <td>{{ $producto->cantidad }}</td>
                                            <td>{{ $producto->categoria }}</td>
                                            <td>
                                                <form action="{{ route('productos.destroy', $producto->_id) }}" method="POST">
                                                    <a class="btn btn-sm" style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;" href="{{ route('productos.show', $producto->_id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    <a class="btn btn-sm" style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;" href="{{ route('productos.edit', $producto->_id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm" style="background-color: #DFD3CC; color: #404E5E; border: 1px solid #97ACBA;" onclick="return confirm('¿Estás seguro de eliminar este producto?');">
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
