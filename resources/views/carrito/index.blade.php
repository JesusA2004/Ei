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
                            <span id="card_title">
                                {{ __('Carritos') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('carritos.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Generar un nuevo carrito') }}
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
                                        <th>Productos</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carritos as $carrito)
                                        <tr>
                                            <td>{{ $carrito->cliente_id }}</td>
                                            <td>{{ $carrito->productos }}</td>
                                            <td>{{ $carrito->total }}</td>
                                            <td>
                                                <form action="{{ route('carritos.destroy', $carrito->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary" href="{{ route('carritos.show', $carrito->id) }}">
                                                        <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                                    </a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('carritos.edit', $carrito->id) }}">
                                                        <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estas seguro de eliminar este carrito?') ? this.closest('form').submit() : false;">
                                                        <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
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
