@extends('layouts.barraL')

@section('template_title')
    Show Product
@endsection

@section('panel-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Product Details</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <strong>Title:</strong>
                        {{ $product->title }}
                    </div>
                    <div class="form-group">
                        <strong>Description:</strong>
                        {{ $product->description }}
                    </div>
                    <div class="form-group">
                        <strong>Price:</strong>
                        ${{ $product->price }}
                    </div>
                    <div class="form-group">
                        <strong>Category:</strong>
                        {{ $product->category }}
                    </div>
                    <div class="form-group">
                        <strong>Image:</strong>
                        @if($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->title }}" style="max-width: 150px;">
                        @else
                            No image
                        @endif
                    </div>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
