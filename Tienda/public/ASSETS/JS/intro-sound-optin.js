const INTRO_AUDIO_SRC = '../assets/audio/intro.mp3';

// CONFIGURACIÓN
const ONLY_ONCE_PER_BROWSER = false; // si true, reproduce solo la 1ª vez que el usuario acepta
const STORAGE_KEY_ACCEPTED = 'motorium_intro_accepted';
const STORAGE_KEY_DISABLED = 'motorium_intro_disabled';
const AUDIO_VOLUME = 0.6; // 0.0 - 1.0

(function () {
  function isDisabled() {
    try { return localStorage.getItem(STORAGE_KEY_DISABLED) === '1'; } catch (e) { return false; }
  }
  function markAccepted() {
    try { localStorage.setItem(STORAGE_KEY_ACCEPTED, '1'); } catch (e) {}
  }
  function alreadyAccepted() {
    try { return localStorage.getItem(STORAGE_KEY_ACCEPTED) === '1'; } catch (e) { return false; }
  }
  function setDisabled() {
    try { localStorage.setItem(STORAGE_KEY_DISABLED, '1'); } catch (e) {}
  }

  // crea audio
  const audio = new Audio(INTRO_AUDIO_SRC);
  audio.preload = 'auto';
  audio.loop = false;
  audio.volume = AUDIO_VOLUME;

  // Crea markup del modal (Bootstrap 5). Se inyecta en body si no existe.
  function ensureModalExists() {
    if (document.getElementById('motoriumIntroModal')) return;
    const wrapper = document.createElement('div');
    wrapper.innerHTML = `
      <div class="modal fade" id="motoriumIntroModal" tabindex="-1" aria-labelledby="motoriumIntroModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content" style="background: rgba(12,12,12,0.95); color: #fff; border: 1px solid rgba(255,255,255,0.04);">
            <div class="modal-header border-bottom-0">
              <h5 class="modal-title" id="motoriumIntroModalLabel">Sonido de bienvenida</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
              <p class="mb-2">¿Deseas escuchar un breve sonido de bienvenida al entrar en la página?</p>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="motoriumIntroNoAgain">
                <label class="form-check-label small" for="motoriumIntroNoAgain">No mostrar esta pregunta de nuevo</label>
              </div>
            </div>
            <div class="modal-footer border-top-0">
              <button type="button" class="btn btn-outline-light" id="motoriumIntroDecline">No, gracias</button>
              <button type="button" class="btn btn-cta" id="motoriumIntroAccept">Escuchar</button>
            </div>
          </div>
        </div>
      </div>
    `;
    document.body.appendChild(wrapper);
  }

  // Si no hay bootstrap.Modal (p.e. no bundle cargado), usamos fallback con confirm()
  function showFallbackPrompt() {
    try {
      const wants = confirm('¿Deseas escuchar el sonido de bienvenida? (Aceptar = Sí)');
      if (wants) {
        playAudioAndSave(false);
      } else {
        // si el usuario cancela, no guardamos nada a menos que marque "no mostrar" - no hay checkbox aquí
      }
    } catch (e) {}
  }

  function playAudioAndSave(noAgainChecked) {
    // reproducir el audio con la interacción del usuario
    audio.currentTime = 0;
    const p = audio.play();
    if (p !== undefined) {
      p.then(() => {
        if (ONLY_ONCE_PER_BROWSER) markAccepted();
        if (noAgainChecked) setDisabled();
      }).catch(() => {
        // si falla por alguna razón, no romper la experiencia
        if (noAgainChecked) setDisabled();
      });
    } else {
      if (ONLY_ONCE_PER_BROWSER) markAccepted();
      if (noAgainChecked) setDisabled();
    }
  }

  function attachHandlersAndShow() {
    ensureModalExists();
    const modalEl = document.getElementById('motoriumIntroModal');
    if (!modalEl) {
      showFallbackPrompt();
      return;
    }

    // inicializar Bootstrap Modal
    let modalInstance;
    try {
      modalInstance = new bootstrap.Modal(modalEl, { backdrop: 'static', keyboard: true });
    } catch (e) {
      // bootstrap no disponible => fallback
      showFallbackPrompt();
      return;
    }

    modalEl.addEventListener('shown.bs.modal', function () {
      const acceptBtn = document.getElementById('motoriumIntroAccept');
      const declineBtn = document.getElementById('motoriumIntroDecline');
      const noAgain = document.getElementById('motoriumIntroNoAgain');

      function cleanupListeners() {
        acceptBtn && acceptBtn.removeEventListener('click', onAccept);
        declineBtn && declineBtn.removeEventListener('click', onDecline);
      }

      function onAccept(e) {
        const noAgainChecked = !!(noAgain && noAgain.checked);
        playAudioAndSave(noAgainChecked);
        if (noAgainChecked) setDisabled();
        if (ONLY_ONCE_PER_BROWSER) markAccepted();
        modalInstance.hide();
        cleanupListeners();
      }

      function onDecline() {
        if (noAgain && noAgain.checked) setDisabled();
        modalInstance.hide();
        cleanupListeners();
      }

      acceptBtn && acceptBtn.addEventListener('click', onAccept);
      declineBtn && declineBtn.addEventListener('click', onDecline);
    });

    modalInstance.show();
  }

  // Lógica principal: mostrar modal solo si el usuario no desactivó y (si ONLY_ONCE) no aceptó antes
  window.addEventListener('load', function () {
    if (isDisabled()) return;
    if (ONLY_ONCE_PER_BROWSER && alreadyAccepted()) return;
    // mostramos el modal pidiendo permiso
    // si Bootstrap no está presente, usamos confirm de fallback
    try {
      attachHandlersAndShow();
    } catch (e) {
      showFallbackPrompt();
    }
  });
})();
