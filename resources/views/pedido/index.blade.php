@extends('layouts.barraL')

@section('template_title')
    Pedidos
@endsection

@section('panel-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Pedidos') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('pedidos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Generar pedido') }}
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
                                <thead class="thead">
                                    <tr>
                                        <th>Cliente ID</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>Ítems</th>
                                        <th>Envío</th>
                                        <th>Pago</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $pedido)
                                        <tr>
                                            <td>{{ $pedido->cliente_id }}</td>
                                            <td>{{ $pedido->total }}</td>
                                            <td>{{ $pedido->estado }}</td>
                                            <td>{{ $pedido->items }}</td>
                                            <td>{{ $pedido->envio }}</td>
                                            <td>{{ $pedido->pago }}</td>
                                            <td>
                                                <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('pedidos.show', $pedido->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Mostrar') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('pedidos.edit', $pedido->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estas seguro de eliminar el pedido?') ? this.closest('form').submit() : false;">
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
                {!! $pedidos->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
