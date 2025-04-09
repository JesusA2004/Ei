@extends('layouts.barraL')

@section('panel-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="border: 1px solid #97ACBA;">
                <div class="card-header" style="background-color: #FFF9F0;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 id="card_title" style="color: #404E5E; font-weight: 600;">{{ __('Carrito de compras') }}</h5>
                        <a href="{{ route('carritos.create') }}" class="btn btn-primary btn-sm" 
                           style="background-color: #5D8EC6; border-color: #5D8EC6;">
                            {{ __('+ Nuevo carrito') }}
                        </a>
                    </div>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success m-4">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body" style="background-color: #FFF9F0;">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead style="background-color: #FFF9F0; border-bottom: 1px solid #97ACBA;">
                                <tr>
                                    <th style="color: #404E5E;">Cliente</th>
                                    <th style="color: #404E5E;">Productos</th>
                                    <th style="color: #404E5E;">Total</th>
                                    <th style="color: #404E5E;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carritos as $carrito)
                                    <tr>
                                        <td style="color: #404E5E;">
                                            @if($carrito->cliente_id)
                                                @php $cliente = App\Models\Cliente::find($carrito->cliente_id); @endphp
                                                @if($cliente)
                                                    {{ $cliente->nombre }} {{ $cliente->apellido }}
                                                @else
                                                    <span class="text-warning">Cliente no encontrado</span>
                                                @endif
                                            @else
                                                <span class="text-muted">Cliente no registrado</span>
                                            @endif
                                        </td>
                                        <td style="color: #404E5E;">
                                            @if(is_array($carrito->productos) && count($carrito->productos) > 0)
                                                <ul class="list-unstyled mb-0">
                                                    @foreach($carrito->productos as $producto)
                                                        <li>
                                                            {{ $producto['nombre'] ?? 'Producto desconocido' }}
                                                            (Cantidad: {{ $producto['cantidad'] ?? 0 }})
                                                            - ${{ number_format($producto['precio_unitario'] ?? 0, 2) }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <span class="text-muted">Sin productos</span>
                                            @endif
                                        </td>
                                        <td style="color: #404E5E;">${{ number_format($carrito->total, 2) }}</td>
                                        <td>
                                            <form action="{{ route('carritos.destroy', $carrito->_id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-sm" 
                                                   style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;"
                                                   href="{{ route('carritos.show', $carrito->_id) }}">
                                                    <i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}
                                                </a>
                                                <a class="btn btn-sm" 
                                                   style="background-color: #5D8EC6; color: #ffffff; border-color: #5D8EC6;"
                                                   href="{{ route('carritos.edit', $carrito->_id) }}">
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
