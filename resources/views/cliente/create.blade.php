@extends('layouts.barraL')

@section('panel-content')
    <div class="container-fluid">
        <div class="row p-3">
            <div class="col-sm-12">
                <div class="card shadow-sm">
                    <!-- Encabezado con título -->
                    <div class="card-header" style="background-color: #FFF9F0; border: 1px solid #97ACBA;">
                        <div class="d-flex justify-content-between align-items-center">
                            <span id="card_title" style="color: #404E5E; font-weight: bold;">{{ __('Agregar cliente') }}</span>
                        </div>
                    </div>

                    <!-- Cuerpo de la tarjeta: formulario -->
                    <div class="card-body" style="background-color: #FFF9F0; border: 1px solid #97ACBA;">
                        <form method="POST" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('cliente.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
