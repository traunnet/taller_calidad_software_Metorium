@extends('layouts.app')

@section('title', 'Productos')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/vistas.css') }}">
@endpush

@section('content')
<div class="container fade-in">
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title"><i class="bi bi-box-seam"></i> Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn btn-cta">+ Nuevo</a>
    </div>

    @if($productos->isEmpty())
        <p class="text-center text-muted">No hay productos registrados.</p>
    @else
        <div class="productos-grid">
            @foreach($productos as $producto)
                <div class="producto-card">
                    <div class="producto-img">
                        @if($producto->imagen)
                            <img src="{{ asset('storage/'.$producto->imagen) }}" alt="{{ $producto->nombre }}">
                        @else
                            <div class="no-img">Sin imagen</div>
                        @endif
                    </div>

                    <div class="producto-info">
                        <h5 class="producto-nombre">{{ $producto->nombre }}</h5>
                        <p class="producto-categoria">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
                        <p class="producto-precio">${{ number_format($producto->precio, 2) }}</p>
                        <p class="producto-stock">Stock: {{ $producto->stock }}</p>
                        <p class="producto-activo {{ $producto->activo ? 'activo' : 'inactivo' }}">
                            {{ $producto->activo ? 'Activo' : 'Inactivo' }}
                        </p>
                    </div>

                    <div class="producto-actions">
                        <a href="{{ route('productos.show', $producto) }}" class="btn btn-sm btn-outline-cta" title="Ver">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('productos.edit', $producto) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" title="Eliminar"
                                onclick="return confirm('¿Eliminar este producto?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
