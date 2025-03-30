@extends('layouts.barraL')

@section('template_title')
    {{ __('Create') }} Producto
@endsection

@section('panel-content')
    <section class="content container-fluid">
        <div class="row padding-1 p-1">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Producto</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('productos.store') }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @include('producto.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
