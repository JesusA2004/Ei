@extends('layouts.app')

@section('content')
<section class="personal-care-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="section-title mb-4">Cuidado personal</h1>
                <p class="section-tagline mb-5">Descubre la belleza que hay en ti con Sara's Secret,<br>productos diseñados para resaltar tu esencia.</p>
                
                <div class="action-buttons">
                    <a href="#" class="btn btn-custom-primary mb-3">Leer más</a>
                    <a href="#" class="btn btn-custom-secondary mb-3">Ver más</a>
                    
                    <div class="search-container">
                        <div class="input-group">
                            <input type="text" class="form-control search-input" placeholder="Buscar">
                            <button class="btn btn-search" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection

@section('scripts')
<script src="{{ asset('js/custom.js') }}"></script>
@endsection