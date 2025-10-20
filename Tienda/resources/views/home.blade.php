<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Motórium — Domina la carretera con estilo</title>

  <link rel="icon" href="{{ asset('ASSETS/img/motorium.ico') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- TU CSS PRINCIPAL -->
  <link rel="stylesheet" href="{{ asset('ASSETS/css/style.css') }}">

</head>
<body>

  <!-- VIDEO (dejado exactamente en la misma posición que tenías) -->
<video id="indexBgVideo" autoplay muted playsinline
  data-videos='[
    "{{ asset('ASSETS/video/kawasaki-z1100.mp4') }}",
    "{{ asset('ASSETS/video/login3.mp4') }}",
    "{{ asset('ASSETS/video/login4.mp4') }}",
    "{{ asset('ASSETS/video/login2.mp4') }}"
  ]'>
  <source src="{{ asset('ASSETS/video/kawasaki-z1100.mp4') }}" type="video/mp4">
</video>


  <nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-sm" id="mainNavbar">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
        <img src="{{ asset('ASSETS/img/Motórium.png') }}" alt="Motórium" class="logo-img me-2">
        <span class="fw-bold brand-name">Motórium</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navLinks">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navLinks">
        <ul class="navbar-nav ms-auto align-items-lg-center">
          <li class="nav-item"><a class="nav-link" href="#home">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="#catalog">Catálogo</a></li>
          <li class="nav-item"><a class="nav-link" href="#promos">Promociones</a></li>
          <li class="nav-item"><a class="nav-link" href="#contact">Contacto</a></li>

          @if(session('admin_logged'))
            <li class="nav-item ms-2">
              <a class="btn btn-outline-light btn-sm" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-speedometer2 me-1"></i>Dashboard
              </a>
            </li>
          @else
            <li class="nav-item ms-2">
              <a class="btn btn-outline-light btn-sm" href="{{ route('login') }}">
                <i class="bi bi-box-arrow-in-right me-1"></i>Login
              </a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <header id="home" class="hero d-flex align-items-center text-center text-white">
    <div class="hero-overlay"></div>
    <div class="container hero-content" data-aos="fade-up">
      <h1 class="display-4 fw-bold">Domina la carretera con estilo</h1>
      <p class="lead my-3">Diseño, potencia y tecnología — la experiencia de conducción que mereces.</p>
      <a href="#catalog" class="btn btn-warning btn-lg fw-semibold shadow-lg">
        Explorar catálogo <i class="bi bi-arrow-right-circle ms-2"></i>
      </a>
    </div>
  </header>

  <main class="main-content">

    <section id="catalog" class="section py-5 bg-dark text-light">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2 class="section-title" data-aos="fade-right">Catálogo destacado</h2>
          <a href="#promos" class="link-light small" data-aos="fade-left">Ver promociones <i class="bi bi-chevron-right"></i></a>
        </div>

        <div class="row g-4">

          <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up">
            <div class="card moto-card h-100 bg-secondary border-0">
              <img src="{{ asset('ASSETS/img/BMW.png') }}" alt="BMW R 1250 GS" class="card-img-top">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">BMW R 1250 GS</h5>
                <p class="card-text small">Máquina de aventura con suspensión adaptable y gran autonomía.</p>
                <div class="mt-auto text-center">
                  <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Ver ofertas</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="card moto-card h-100 bg-secondary border-0">
              <img src="{{ asset('ASSETS/img/Kawasaki.png') }}" alt="Kawasaki Ninja ZX-10R" class="card-img-top">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">Kawasaki Ninja ZX-10R</h5>
                <p class="card-text small">Motocicleta deportiva de alto rendimiento, 998cc.</p>
                <div class="mt-auto text-center">
                  <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Ver ofertas</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-sm-6 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="card moto-card h-100 bg-secondary border-0">
              <img src="{{ asset('ASSETS/img/casco.png') }}" alt="Casco AGV K3 SV" class="card-img-top">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">Casco Integral AGV K3 SV</h5>
                <p class="card-text small">Casco certificado de alta seguridad, visor solar integrado.</p>
                <div class="mt-auto text-center">
                  <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Ver ofertas</a>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

    <section id="promos" class="section bg-warning text-dark py-5 text-center">
      <div class="container">
        <h2 class="fw-bold mb-4" data-aos="fade-up">Promociones destacadas</h2>
        <p class="lead mb-5" data-aos="fade-up" data-aos-delay="100">
          Aprovecha descuentos y beneficios exclusivos por tiempo limitado.
        </p>
        <a href="{{ route('login') }}" class="btn btn-outline-dark btn-lg fw-semibold" data-aos="zoom-in">
          Ver ofertas
        </a>
      </div>
    </section>

    <section id="testimonials" class="section py-5 bg-dark text-light">
      <div class="container">
        <h2 class="section-title mb-4 text-center" data-aos="fade-up">Testimonios</h2>
        <div class="row g-4">
          <div class="col-md-4" data-aos="flip-left">
            <div class="card testimonial bg-secondary p-3 border-0">
              <div class="card-body">
                <p class="mb-2">"La R 1250 GS me permite viajar sin límites."</p>
                <div class="small">— Andrés C.</div>
              </div>
            </div>
          </div>
          <div class="col-md-4" data-aos="flip-left" data-aos-delay="100">
            <div class="card testimonial bg-secondary p-3 border-0">
              <div class="card-body">
                <p class="mb-2">"Mi Ninja ZX-10R es una bestia, pura adrenalina."</p>
                <div class="small">— Valentina R.</div>
              </div>
            </div>
          </div>
          <div class="col-md-4" data-aos="flip-left" data-aos-delay="200">
            <div class="card testimonial bg-secondary p-3 border-0">
              <div class="card-body">
                <p class="mb-2">"Los cascos AGV son los mejores en comodidad y seguridad."</p>
                <div class="small">— Jorge M.</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="contact" class="section bg-secondary text-white py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6" data-aos="fade-right">
            <h3>Contacto</h3>
            <p><i class="bi bi-geo-alt-fill me-2"></i> Calle Principal 123, Ciudad</p>
            <p><i class="bi bi-telephone-fill me-2"></i> +57 300 000 0000</p>
            <p><i class="bi bi-envelope-fill me-2"></i> ventas@motorium.com</p>
          </div>
          <div class="col-md-6" data-aos="fade-left">
            <form class="row g-2">
              <div class="col-12">
                <input class="form-control" type="text" placeholder="Tu nombre">
              </div>
              <div class="col-12 col-md-6">
                <input class="form-control" type="email" placeholder="Correo electrónico">
              </div>
              <div class="col-12 col-md-6">
                <input class="form-control" type="tel" placeholder="Teléfono (opcional)">
              </div>
              <div class="col-12">
                <textarea class="form-control" rows="3" placeholder="Mensaje"></textarea>
              </div>
              <div class="col-12 text-end">
                <button class="btn btn-warning">Enviar mensaje</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </main>

  <footer class="py-4 bg-black text-center text-light">
    <p class="mb-0">
      © <span id="currentYear"></span> Motórium. Todos los derechos reservados.
    </p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>

  <script src="{{ asset('ASSETS/JS/script.js') }}"></script>
  <script src="{{ asset('ASSETS/JS/index-bg.js') }}"></script>
  <script src="{{ asset('ASSETS/JS/intro-sound-optin.js') }}"></script>
  <script>
    document.getElementById("currentYear").textContent = new Date().getFullYear();
  </script>
</body>
</html>
