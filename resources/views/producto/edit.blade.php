@extends('layouts.barraL')

@section('template_title')
    {{ __('Update') }} Producto
@endsection

@section('panel-content')
<section class="content container-fluid">
    <div class="row p-3">
        <div class="col-md-12">
            <form method="POST" action="{{ route('productos.update', $producto->_id) }}" role="form" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                @include('producto.form')
            </form>
        </div>
    </div>
</section>
@endsection
