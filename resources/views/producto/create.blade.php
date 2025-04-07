@extends('layouts.barraL')

@section('template_title')
    {{ __('Create') }} Producto
@endsection

@section('panel-content')
<section class="content container-fluid">
    <div class="row p-3">
        <div class="col-md-12">
            <form method="POST" action="{{ route('productos.store') }}" role="form" enctype="multipart/form-data">
                @csrf
                @include('producto.form')
            </form>
        </div>
    </div>
</section>
@endsection
