@extends('layouts.barraL')

@section('template_title')
    Edit Product
@endsection

@section('panel-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Product</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('products.form', ['product' => $product])
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
