@extends('layouts.app')
@section('title', 'Nuevo Producto')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/vistas.css') }}">
@endpush

@section('content')
<div class="container fade-in">
    <div class="card-motorium p-4">
        <h1 class="page-title"><i class="bi bi-plus-lg"></i> Nuevo Producto</h1>

        {{-- FORMULARIO --}}
        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <label class="label-text">Categoría</label>
                <select name="id_categoria" class="form-select @error('id_categoria') is-invalid @enderror" required>
                    <option value="">Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}" {{ old('id_categoria') == $categoria->id_categoria ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Debe seleccionar una categoría.</div>
            </div>

            <div class="mb-3">
                <label class="label-text">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control @error('nombre') is-invalid @enderror" required>
                <div class="invalid-feedback">Ingrese un nombre válido.</div>
            </div>

            <div class="mb-3">
                <label class="label-text">Descripción</label>
                <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" required>{{ old('descripcion') }}</textarea>
                <div class="invalid-feedback">Ingrese una descripción.</div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="label-text">Precio</label>
                    <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" class="form-control @error('precio') is-invalid @enderror" required min="0">
                    <div class="invalid-feedback">Ingrese un precio válido.</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-text">Stock</label>
                    <input type="number" name="stock" value="{{ old('stock') }}" class="form-control @error('stock') is-invalid @enderror" required min="0">
                    <div class="invalid-feedback">Ingrese un valor de stock válido.</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-text">SKU</label>
                    <input type="text" name="sku" value="{{ old('sku') }}" class="form-control @error('sku') is-invalid @enderror" required>
                    <div class="invalid-feedback">Ingrese un SKU válido.</div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="label-text">Marca</label>
                    <input type="text" name="marca" value="{{ old('marca') }}" class="form-control @error('marca') is-invalid @enderror" required>
                    <div class="invalid-feedback">Ingrese la marca.</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-text">Modelo</label>
                    <input type="text" name="modelo" value="{{ old('modelo') }}" class="form-control @error('modelo') is-invalid @enderror" required>
                    <div class="invalid-feedback">Ingrese el modelo.</div>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-text">Año</label>
                    <input type="number" name="anio" value="{{ old('anio') }}" class="form-control @error('anio') is-invalid @enderror" required min="1900" max="{{ date('Y') + 1 }}">
                    <div class="invalid-feedback">Ingrese un año válido.</div>
                </div>
            </div>

            <div class="mb-3">
                <label class="label-text">Ficha Técnica</label>
                <textarea name="ficha_tecnica" class="form-control @error('ficha_tecnica') is-invalid @enderror" required>{{ old('ficha_tecnica') }}</textarea>
                <div class="invalid-feedback">Ingrese una ficha técnica.</div>
            </div>

            <div class="mb-3">
                <label class="label-text">Activo</label>
                <select name="activo" class="form-select @error('activo') is-invalid @enderror" required>
                    <option value="">Seleccione una opción</option>
                    <option value="1" {{ old('activo') == '1' ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ old('activo') == '0' ? 'selected' : '' }}>No</option>
                </select>
                <div class="invalid-feedback">Seleccione si el producto está activo.</div>
            </div>

            <div class="mb-3">
                <label class="label-text">Imagen del producto (opcional)</label>
                <input type="file" name="imagen" class="form-control @error('imagen') is-invalid @enderror" accept="image/*">
                <div class="invalid-feedback">Debe seleccionar una imagen válida (jpg, jpeg, png, webp).</div>
            </div>

            <button type="submit" class="btn btn-cta">Guardar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-outline-cta ms-2">Cancelar</a>
        </form>
    </div>
</div>

{{-- SCRIPT DE VALIDACIÓN CLIENTE --}}
<script>
(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})();
</script>
@endsection
