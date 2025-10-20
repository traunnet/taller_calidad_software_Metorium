@extends('layouts.app')

@section('title', 'Categorías')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/vistas.css') }}">
@endpush

@section('content')
<div class="container fade-in">
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="page-title"><i class="bi bi-tags"></i> Categorías</h1>
        <a href="{{ route('categorias.create') }}" class="btn btn-cta">+ Nueva</a>
    </div>

    @if($categorias->isEmpty())
        <p class="text-center text-muted">No hay categorías registradas.</p>
    @else
        <div class="productos-grid">
            @foreach($categorias as $categoria)
                <div class="producto-card">
                    <div class="producto-img categoria-img">
                        <img src="{{ $categoria->imagen_categoria }}" alt="{{ $categoria->nombre }}">
                    </div>

                    <div class="producto-info">
                        <h5 class="producto-nombre">{{ $categoria->nombre }}</h5>
                        @if($categoria->descripcion)
                            <p style="color: white" class="producto-categoria">{{ Str::limit($categoria->descripcion, 80) }}</p>
                        @else
                            <p class="producto-categoria text-muted fst-italic">Sin descripción</p>
                        @endif
                    </div>

                    <div class="producto-actions">
                        <a href="{{ route('categorias.show', $categoria) }}" class="btn btn-sm btn-outline-cta" title="Ver">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" title="Eliminar"
                                onclick="return confirm('¿Eliminar esta categoría?')">
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
