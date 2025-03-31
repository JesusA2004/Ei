@extends('layouts.barraL')

@section('template_title')
    Products
@endsection

@section('panel-content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Products</h2>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ $product->image ?? asset('images/default.png') }}" 
                         class="card-img-top img-fluid" 
                         alt="{{ $product->title ?? 'No title' }}" 
                         style="object-fit: cover; height: 200px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title ?? 'No title' }}</h5>
                        <p class="card-text">{{ \Illuminate\Support\Str::limit($product->description ?? 'No description available', 100) }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Price:</strong> ${{ $product->price ?? 'N/A' }}</li>
                        <li class="list-group-item"><strong>Category:</strong> {{ $product->category ?? 'Unknown' }}</li>
                        <li class="list-group-item">
                            <strong>Rating:</strong> 
                            @if (is_object($product->rating))
                                {{ $product->rating->rate ?? 'N/A' }}
                                <small class="text-muted">({{ $product->rating->count ?? 0 }} reviews)</small>
                            @else
                                N/A
                            @endif
                        </li>
                    </ul>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary btn-sm">View</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Paginación con Bootstrap --}}
    <div class="d-flex justify-content-center mt-4">
        {!! $products->links('vendor.pagination.bootstrap-5') !!}
    </div>
</div>
@endsection
