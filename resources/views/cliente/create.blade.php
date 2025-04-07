@extends('layouts.barraL')

@section('panel-content')
    <section class="content container-fluid">
        <div class="row padding-1 p-1">
            <div class="col-md-12">
                <div class="card card-default" style="border-color: #404E5E;">
                    <div class="card-header" style="background-color: #5D8EC6; color: #ffffff;">
                        <span class="card-title">Registrar cliente</span>
                    </div>
                    <div class="card-body" style="background-color: #F9EFE6;">
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
