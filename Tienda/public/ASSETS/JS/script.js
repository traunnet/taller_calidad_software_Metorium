document.addEventListener('DOMContentLoaded', function () {
  // Inicializa AOS (animate on scroll)
  if (window.AOS) {
    AOS.init({
      once: true,
      duration: 800,
      easing: 'ease-in-out-cubic'
    });
  }

  // Añadir año actual en el footer
  const yearEl = document.getElementById('currentYear');
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  // Smooth scroll para botones con href a anchors (en navegadores que no respeten CSS)
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      // si el link apunta a un ancla en la misma página
      const targetId = this.getAttribute('href').slice(1);
      if (targetId) {
        const target = document.getElementById(targetId);
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      }
    });
  });

  // Mejora visual: añadir sombra cuando se hace scroll (navbar)
  const navbar = document.getElementById('mainNavbar');
  function toggleNavbarShadow() {
    if (window.scrollY > 10) navbar.classList.add('scrolled');
    else navbar.classList.remove('scrolled');
  }
  toggleNavbarShadow();
  window.addEventListener('scroll', toggleNavbarShadow);

  // Evento para botones "Comprar" de ejemplo (puedes personalizar)
  document.querySelectorAll('.btn-cta-sm').forEach(btn => {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      // Feedback visual (temporal)
      btn.classList.add('active-feedback');
      setTimeout(() => btn.classList.remove('active-feedback'), 400);
      // Aquí podrías abrir modal de compra o redirigir
    });
  });
});
