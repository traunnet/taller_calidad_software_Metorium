@extends('layouts.app')
@section('title', 'Nuevo Producto')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/vistas.css') }}">
@endpush

@section('content')
<div class="container fade-in">
    <div class="card-motorium p-4">
        <h1 class="page-title"><i class="bi bi-plus-lg"></i> Nuevo Producto</h1>

        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="label-text">Categoría</label>
                <select name="id_categoria" class="form-select" required>
                    <option value="">Seleccione una categoría</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="label-text">Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="label-text">Descripción</label>
                <textarea name="descripcion" class="form-control"></textarea>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="label-text">Precio</label>
                    <input type="number" step="0.01" name="precio" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-text">Stock</label>
                    <input type="number" name="stock" class="form-control" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-text">SKU</label>
                    <input type="text" name="sku" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="label-text">Marca</label>
                    <input type="text" name="marca" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-text">Modelo</label>
                    <input type="text" name="modelo" class="form-control">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="label-text">Año</label>
                    <input type="number" name="anio" class="form-control">
                </div>
            </div>

            <div class="mb-3">
                <label class="label-text">Ficha Técnica</label>
                <textarea name="ficha_tecnica" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label class="label-text">Activo</label>
                <select name="activo" class="form-select">
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="label-text">Imagen del producto</label>
                <input type="file" name="imagen" class="form-control" accept="image/*">
            </div>

            <button type="submit" class="btn btn-cta">Guardar</button>
            <a href="{{ route('productos.index') }}" class="btn btn-outline-cta ms-2">Cancelar</a>
        </form>
    </div>
</div>
@endsection
