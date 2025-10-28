@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/vistas.css') }}">
@endpush

@section('content')
<div class="container">
    <h1>Editar Categoría</h1>
    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" value="{{ $categoria->nombre }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" value="{{ $categoria->slug }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control">{{ $categoria->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
