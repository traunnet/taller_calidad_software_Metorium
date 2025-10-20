@extends('layouts.app')
@section('title', 'Detalle del Producto')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/vistas.css') }}">
@endpush

@section('content')
<div class="container fade-in">
    <div class="card-motorium p-4">
        <h1 class="page-title">{{ $producto->nombre }}</h1>

        <div class="row">
            <div class="col-md-5 text-center mb-4">
                @if($producto->imagen)
                    <img src="{{ asset('storage/'.$producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid rounded" style="max-height: 300px;">
                @else
                    <div class="text-secondary fst-italic mt-4">Sin imagen disponible</div>
                @endif
            </div>

            <div class="col-md-7">
                <div class="info-card">
                    <p><strong>Categoría:</strong> {{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
                    <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
                    <p><strong>Stock:</strong> {{ $producto->stock }}</p>
                    <p><strong>SKU:</strong> {{ $producto->sku }}</p>
                    <p><strong>Marca:</strong> {{ $producto->marca ?: '—' }}</p>
                    <p><strong>Modelo:</strong> {{ $producto->modelo ?: '—' }}</p>
                    <p><strong>Año:</strong> {{ $producto->anio ?: '—' }}</p>
                    <p><strong>Activo:</strong> {{ $producto->activo ? 'Sí' : 'No' }}</p>
                </div>

                <div class="mt-3">
                    <p><strong>Descripción:</strong><br>{{ $producto->descripcion ?: 'Sin descripción' }}</p>
                    <p><strong>Ficha Técnica:</strong><br>{{ $producto->ficha_tecnica ?: 'No especificada' }}</p>
                </div>

                <div class="mt-4">
                    <a href="{{ route('productos.index') }}" class="btn btn-outline-cta"><i class="bi bi-arrow-left"></i> Volver</a>
                    <a href="{{ route('productos.edit', $producto) }}" class="btn btn-cta ms-2"><i class="bi bi-pencil"></i> Editar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
