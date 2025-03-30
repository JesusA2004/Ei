@extends('layouts.barraL')

@section('template_title')
    {{ __('Register') }} Cliente
@endsection

@section('panel-content')
    <section class="content container-fluid">
        <div class="row padding-1 p-1">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Register') }} Cliente</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('clientes.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('cliente.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
