@extends('layouts.barraL')

@section('template_title')
    {{ __('Update') }} Pedido
@endsection

@section('panel-content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Pedido</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}" role="form" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            @include('pedido.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
