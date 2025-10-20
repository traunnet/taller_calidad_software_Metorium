@extends('layouts.app')

@section('title', 'Dashboard Admin')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/vistas.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
<style>
/* === Partículas suaves borrosas === */
#particles-bg {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -2;
    filter: blur(3px);
    opacity: 0.35;
    pointer-events: none;
}
</style>
@endpush

@section('content')
<div class="dashboard-bg"></div> {{-- 🌌 Fondo animado sutil --}}
<canvas id="particles-bg"></canvas>

<div class="container dashboard-container fade-in">
    <div class="dashboard-header text-center mb-4">
        <h1><i class="bi bi-speedometer2"></i> Panel de Administración</h1>
        <p class="dashboard-greeting">Bienvenido, <strong>{{ session('admin_user', 'Administrador') }}</strong></p>
    </div>

    <!-- Tarjetas de estadísticas -->
    <div class="dashboard-stats">
        <div class="stat-card">
            <i class="bi bi-box-seam stat-icon"></i>
            <div class="stat-value">{{ \App\Models\Producto::count() }}</div>
            <div class="stat-label">Productos</div>
        </div>
        <div class="stat-card">
            <i class="bi bi-tags stat-icon"></i>
            <div class="stat-value">{{ \App\Models\Categoria::count() }}</div>
            <div class="stat-label">Categorías</div>
        </div>
        <div class="stat-card">
            <i class="bi bi-people stat-icon"></i>
            <div class="stat-value">3</div>
            <div class="stat-label">Usuarios simulados</div>
        </div>
    </div>

    <!-- Accesos rápidos -->
    <div class="quick-access mt-4">
        <h5><i class="bi bi-lightning-charge"></i> Accesos rápidos</h5>
        <a href="{{ route('productos.index') }}" class="quick-btn"><i class="bi bi-box"></i> Productos</a>
        <a href="{{ route('categorias.index') }}" class="quick-btn"><i class="bi bi-tags"></i> Categorías</a>
        <a href="#" class="quick-btn"><i class="bi bi-person"></i> Usuarios</a>
    </div>

    <!-- Cerrar sesión -->
    <div class="logout-card mt-4 text-center">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-danger">
                <i class="bi bi-box-arrow-right"></i> Cerrar sesión
            </button>
        </form>
    </div>

    <!-- Actividad reciente -->
    <div class="activity-card mt-5">
        <h5><i class="bi bi-clock-history"></i> Actividad reciente</h5>
        <ul>
            <li>Se creó una nueva categoría: <strong>Deportivas</strong></li>
            <li>Se actualizó el producto <strong>Casco Shark EVO</strong></li>
            <li>Se eliminó la categoría <strong>Custom</strong></li>
        </ul>
    </div>

</div>

@endsection
