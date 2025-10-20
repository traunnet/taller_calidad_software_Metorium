@extends('layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/vistas.css') }}">
@endpush

@section('content')
<div class="container">
    <h1>{{ $categoria->nombre }}</h1>
    <p><strong>Slug:</strong> {{ $categoria->slug }}</p>
    <p>{{ $categoria->descripcion }}</p>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
