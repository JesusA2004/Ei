@extends('layouts.app')

@section('template_title')
    {{ $carrito->cliente_id ?? __('Show') . " " . __('Carrito') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Carrito</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('carritos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>
                    <div class="card-body bg-white">
                        <div class="mb-3">
                            <strong>Sesión ID:</strong> {{ $carrito->sesion_id }}
                        </div>
                        <div class="mb-3">
                            <strong>Cliente ID:</strong> {{ $carrito->cliente_id }}
                        </div>
                        <div class="mb-3">
                            <strong>Productos:</strong> {{ $carrito->productos }}
                        </div>
                        <div class="mb-3">
                            <strong>Total:</strong> {{ $carrito->total }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
