@extends('layouts.barraL')

@section('template_title')
    {{ $pedido->cliente_id ?? __('Mostrar') . " " . __('Pedido') }}
@endsection

@section('panel-content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Mostrar') }} Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('pedidos.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="mb-3">
                            <strong>Cliente ID:</strong> {{ $pedido->cliente_id }}
                        </div>
                        <div class="mb-3">
                            <strong>Total:</strong> {{ $pedido->total }}
                        </div>
                        <div class="mb-3">
                            <strong>Estado:</strong> {{ $pedido->estado }}
                        </div>
                        <div class="mb-3">
                            <strong>Ítems:</strong> {{ $pedido->items }}
                        </div>
                        <div class="mb-3">
                            <strong>Envío:</strong> {{ $pedido->envio }}
                        </div>
                        <div class="mb-3">
                            <strong>Pago:</strong> {{ $pedido->pago }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
