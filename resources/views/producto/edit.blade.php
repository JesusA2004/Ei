@extends('layouts.barraL')

@section('panel-content')
<section class="content container-fluid">
  <div class="row p-3 justify-content-center">
    <!-- Se aumenta la anchura del formulario -->
    <div class="col-md-12 col-lg-10">
      <form method="POST" action="{{ route('productos.update', $producto->_id) }}" role="form" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @include('producto.form')
      </form>
    </div>
  </div>
</section>
@endsection
