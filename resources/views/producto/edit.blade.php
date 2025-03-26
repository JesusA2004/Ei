@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Producto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row padding-1 p-1">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <span class="card-title">{{ __('Update') }} Producto</span>
                        <a class="btn btn-primary btn-sm" href="{{ route('productos.index') }}">
                            {{ __('Back') }}
                        </a>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('productos.update', $producto->_id) }}" role="form" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            @include('producto.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
