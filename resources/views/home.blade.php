@extends('layouts.barraL')

@section('template_title')
    Dashboard
@endsection

@section('panel-content')
<div class="container-fluid px-4">
    <h1 class="mt-4 fw-bold text-dark">Dashboard</h1>

    <!-- Tarjetas de resumen -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card card-summary shadow-sm border-0" style="background-color: var(--card-bg-summary-1);">
                <div class="card-body">Productos de Skincare</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small stretched-link" href="#">Ver detalles</a>
                    <div class="small"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-summary shadow-sm border-0" style="background-color: var(--card-bg-summary-2);">
                <div class="card-body">Ventas de Perfumes</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small stretched-link" href="#">Ver detalles</a>
                    <div class="small"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-summary shadow-sm border-0" style="background-color: var(--card-bg-summary-3);">
                <div class="card-body">Órdenes Entregadas</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small stretched-link" href="#">Ver detalles</a>
                    <div class="small"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-summary shadow-sm border-0" style="background-color: var(--card-bg-summary-4);">
                <div class="card-body">Clientes Registrados</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small stretched-link" href="#">Ver detalles</a>
                    <div class="small"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficas -->
    <div class="row mb-4">
        <div class="col-xl-6">
            <div class="card card-chart shadow-sm border-0">
                <div class="card-header fw-semibold">
                    <i class="fas fa-chart-area me-2"></i> Tendencia de Ventas
                </div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card card-chart shadow-sm border-0">
                <div class="card-header fw-semibold">
                    <i class="fas fa-chart-bar me-2"></i> Categorías más vendidas
                </div>
                <div class="card-body">
                    <canvas id="myBarChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush
