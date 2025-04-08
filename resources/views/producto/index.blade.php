@extends('layouts.barraL')

@section('template_title')
    Productos
@endsection

@section('panel-content')
    <div class="container-fluid">
        <div class="row p-3">
            <div class="col-sm-12">
                <div class="card shadow-sm" style="border: 1px solid #97ACBA;">
                    <!-- Encabezado de la tarjeta con fondo claro y texto en azul oscuro -->
                    <div class="card-header" style="background-color: #FFF9F0; border: 1px solid #97ACBA;">
                        <div class="d-flex justify-content-between align-items-center">
                            <span id="card_title" style="color: #404E5E; font-weight: bold;">{{ __('Productos') }}</span>
                            <div>
                                <a href="{{ route('productos.create') }}" class="btn btn-sm" 
                                   style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;">
                                    {{ __('Agregar producto') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                   
                    <!-- Cuerpo de la tarjeta con fondo y borde consistentes -->
                    <div class="card-body" style="background-color: #FFF9F0; border: 1px solid #97ACBA;">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle">
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
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td class="text-center">
                                                @if($producto->foto)
                                                    <img src="{{ asset('storage/productos/' . $producto->foto) }}" 
                                                         alt="{{ $producto->nombre }}" class="img-fluid" style="max-width: 80px;">
                                                @else
                                                    <span style="color: #404E5E;">Sin foto</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $producto->nombre }}</td>
                                            <td class="text-center">{{ $producto->descripcion }}</td>
                                            <td class="text-center">{{ $producto->precio }}</td>
                                            <td class="text-center">{{ $producto->cantidad }}</td>
                                            <td class="text-center">{{ $producto->categoria }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('productos.destroy', $producto->_id) }}" method="POST">
                                                    <a class="btn btn-sm" 
                                                       style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;" 
                                                       href="{{ route('productos.show', $producto->_id) }}">
                                                        <i class="fa fa-fw fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-sm" 
                                                       style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;" 
                                                       href="{{ route('productos.edit', $producto->_id) }}">
                                                        <i class="fa fa-fw fa-edit"></i>
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm" 
                                                            style="background-color: #DFD3CC; color: #404E5E; border: 1px solid #97ACBA;"
                                                            onclick="return confirm('¿Estás seguro de eliminar este producto?');">
                                                        <i class="fa fa-fw fa-trash"></i>
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
