<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Productos — Motórium')</title>

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    {{-- Fuentes y animaciones --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    {{-- Estilos personalizados --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0d0d0d;
            color: #f0f0f0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        nav.navbar {
            background: linear-gradient(90deg, #141414, #1a1a1a, #121212);
            box-shadow: 0 3px 8px rgba(0,0,0,0.4);
        }

        .navbar-brand {
            font-weight: 700;
            color: #ff3b3f !important;
            letter-spacing: 0.5px;
        }

        .nav-link {
            color: #ddd !important;
            font-weight: 500;
        }
        .nav-link:hover {
            color: #ff3b3f !important;
        }

        .btn-outline-light:hover {
            background-color: #ff3b3f;
            border-color: #ff3b3f;
        }

        main.container {
            flex-grow: 1;
            padding-top: 1rem;
            padding-bottom: 3rem;
            animation: fadeIn 0.4s ease;
        }

        footer {
            background: #0b0b0b;
            color: #888;
            font-size: 0.9rem;
            padding: 1rem 0;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.05);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    @stack('styles')
</head>
<body>
    {{-- Navbar principal --}}
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="bi bi-gear-fill me-1"></i> Motórium
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="{{ route('productos.index') }}" class="nav-link">
                            <i class="bi bi-box-seam me-1"></i> Productos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('categorias.index') }}" class="nav-link">
                            <i class="bi bi-tags-fill me-1"></i> Categorías
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto align-items-center">
                    @if(session('admin_logged'))
                        <li class="nav-item me-2">
                            <a class="btn btn-sm btn-outline-light" href="{{ route('admin.dashboard') }}">
                                <i class="bi bi-speedometer2 me-1"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-box-arrow-right me-1"></i> Cerrar sesión
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-sm btn-cta" href="{{ route('login') }}">
                                <i class="bi bi-person-fill me-1"></i> Iniciar sesión
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <main class="container" data-aos="fade-up">
        @if(session('success'))
            <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>

    {{-- Footer --}}
    <footer>
        <div class="container">
            <small>© {{ date('Y') }} Motórium — Todos los derechos reservados.</small>
        </div>
    </footer>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
    @stack('scripts')
</body>
</html>
