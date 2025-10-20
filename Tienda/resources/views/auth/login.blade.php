@extends('layouts.app')

@section('title', 'Login — Motórium')

@section('content')
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login — Motórium</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <style>
    html,body { height:100%; font-family:'Poppins',sans-serif; }
    .bg-video { position:fixed; inset:0; z-index:0; overflow:hidden; }
    .bg-video video { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; display:block; }
    .bg-overlay { position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:1; pointer-events:none; }
    .login-page .container { position:relative; z-index:2; }
    .login-card { backdrop-filter:blur(6px); background:linear-gradient(180deg, rgba(18,18,18,0.85), rgba(12,12,12,0.85)); border:1px solid rgba(255,255,255,0.04); }
    .btn-cta { background-color:#ff3b3f; color:white; font-weight:600; border:none; }
    .btn-cta:hover { background-color:#e13236; color:white; }
    .logo-img { width:120px; height:auto; }
    @media (max-width:576px) { .bg-overlay { background:rgba(0,0,0,0.55); } }
  </style>
</head>
<body class="login-page">
  <div class="bg-video" aria-hidden="true">
    <video id="bgVideo" autoplay muted playsinline loop>
      <source src="{{ asset('assets/video/bg.mp4') }}" type="video/mp4">
    </video>
    <div class="bg-overlay"></div>
  </div>

  <div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="card login-card p-4 shadow-lg" data-aos="zoom-in">
      <div class="card-body">
        <div class="text-center mb-3">
          <img src="{{ asset('assets/img/Motórium.png') }}" alt="Motórium" class="logo-img me-2">
          <h4 class="mt-2 mb-0 text-white">Bienvenido a Motórium</h4>
          <p class="text-muted small">Inicia sesión para acceder a tu cuenta</p>
        </div>

        {{-- Mostrar mensaje de error si existe --}}
        @if(session('error'))
          <div class="alert alert-danger text-center py-2">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login.attempt') }}" method="POST">
          @csrf
          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
            <input id="email" name="email" type="email" class="form-control" placeholder="Correo electrónico" required>
          </div>

          <div class="mb-3 input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <input id="password" name="password" type="password" class="form-control" placeholder="Contraseña" required>
          </div>

          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="remember">
              <label class="form-check-label small text-light" for="remember">Recordarme</label>
            </div>
            <a href="#" class="small text-decoration-none text-light">¿Olvidaste tu contraseña?</a>
          </div>

          <div class="d-grid mb-3">
            <button class="btn btn-cta" type="submit">Iniciar sesión (simulado)</button>
          </div>

          <div class="text-center small text-light">
            ¿No tienes cuenta? <a href="#" class="link-underline text-white">Crear cuenta</a>
          </div>

          <div class="text-center mt-3">
            <a href="{{ route('home') }}" class="btn btn-link text-secondary">Volver al inicio</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>
  <script src="{{ asset('assets/js/login-bg.js') }}"></script>
  <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
@endsection
