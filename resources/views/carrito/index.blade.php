@extends('layouts.app')

@section('template_title')
    Carritos
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">{{ __('Carritos') }}</span>
                            <div class="float-right">
                                <a href="{{ route('carritos.create') }}" class="btn btn-primary btn-sm">
                                    {{ __('Nuevo Carrito') }}
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
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Productos</th>
                                        <th>Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carritos as $carrito)
                                        <tr>
                                            <td>
                                                @if($carrito->cliente_id)
                                                    @php $cliente = App\Models\Cliente::find($carrito->cliente_id); @endphp
                                                    @if($cliente)
                                                        {{ $cliente->nombre }} {{ $cliente->apellido }}
                                                    @else
                                                        Cliente no encontrado
                                                    @endif
                                                @else
                                                    Cliente no registrado
                                                @endif
                                            </td>
                                            <td>
                                                @if($carrito->productos && is_string($carrito->productos))
                                                    @php
                                                        $productosCarrito = json_decode($carrito->productos, true);
                                                    @endphp
                                                    <ul class="list-unstyled">
                                                        @foreach($productosCarrito as $producto)
                                                            <li>
                                                                {{ $producto['nombre'] ?? 'Producto desconocido' }}
                                                                (Cantidad: {{ $producto['cantidad'] ?? 0 }})
                                                                - ${{ number_format($producto['precio_unitario'] ?? 0, 2) }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    Sin productos
                                                @endif
                                            </td>
                                            <td>${{ number_format($carrito->total, 2) }}</td>
                                            <td>
                                                <form action="{{ route('carritos.destroy', $carrito->_id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a class="btn btn-sm btn-primary" href="{{ route('carritos.show', $carrito->_id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('carritos.edit', $carrito->_id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </a>
                                                    <button type="submit" class="btn btn-danger btn-sm" 
                                                        onclick="return confirm('¿Estás seguro de eliminar este carrito?')">
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
                {!! $carritos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection