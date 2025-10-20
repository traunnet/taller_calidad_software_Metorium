@extends('layouts.app')
@section('title', 'Editar Producto')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/vistas.css') }}">
@endpush

@section('content')
<div class="container fade-in">
    <div class="card-motorium p-4">
        <h1 class="page-title"><i class="bi bi-pencil"></i> Editar Producto</h1>

        <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="mb-3">
                <label class="label-text">Categoría</label>
                <select name="id_categoria" class="form-select" required>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}" 
                            {{ $producto->id_categoria == $categoria->id_categoria ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="label-text">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" class="form-control" required>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="label-text">Precio</label>
                    <input type="number" step="0.01" name="precio" value="{{ old('precio', $producto->precio) }}" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-text">Stock</label>
                    <input type="number" name="stock" value="{{ old('stock', $producto->stock) }}" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-text">SKU</label>
                    <input type="text" name="sku" value="{{ old('sku', $producto->sku) }}" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="label-text">Marca</label>
                    <input type="text" name="marca" value="{{ old('marca', $producto->marca) }}" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-text">Modelo</label>
                    <input type="text" name="modelo" value="{{ old('modelo', $producto->modelo) }}" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-text">Año</label>
                    <input type="number" name="anio" value="{{ old('anio', $producto->anio) }}" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label class="label-text">Descripción</label>
                <textarea name="descripcion" class="form-control">{{ old('descripcion', $producto->descripcion) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="label-text">Ficha Técnica</label>
                <textarea name="ficha_tecnica" class="form-control">{{ old('ficha_tecnica', $producto->ficha_tecnica) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="label-text">Activo</label>
                <select name="activo" class="form-select">
                    <option value="1" {{ $producto->activo ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ !$producto->activo ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="label-text">Imagen del producto</label>
                @if($producto->imagen)
                    <div class="mb-2">
                        <img src="{{ asset('storage/'.$producto->imagen) }}" 
                             alt="Imagen actual" class="img-thumbnail" style="max-width: 150px;">
                    </div>
                @endif
                <input type="file" name="imagen" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-cta">Actualizar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-outline-cta ms-2">Cancelar</a>
        </form>
    </div>
</div>
@endsection
