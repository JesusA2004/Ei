@extends('layouts.barraL')

@section('template_title')
    Create Product
@endsection

@section('panel-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Create Product</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        @include('products.form')
                        <button type="submit" class="btn btn-primary mt-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
