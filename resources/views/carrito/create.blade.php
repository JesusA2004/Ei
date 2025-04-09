@extends('layouts.barraL')

@section('panel-content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="border: 1px solid #97ACBA;">
                <div class="card-header" style="background-color: #FFF9F0;">
                    <h5 class="card-title" style="color: #404E5E; font-weight: 600;">{{ __('Create Carrito') }}</h5>
                </div>
                <div class="card-body" style="background-color: #FFF9F0;">
                    <form method="POST" action="{{ route('carritos.store') }}" role="form" enctype="multipart/form-data">
                        @csrf
                        @include('carrito.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
