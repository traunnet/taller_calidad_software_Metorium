document.addEventListener('DOMContentLoaded', () => {
  const video = document.getElementById('indexBgVideo');
  if (!video) return;

  try {
    video.loop = false;
  } catch (e) {
    console.warn('index-bg.js: no se pudo desactivar el loop del video', e);
  }

  let playlist;
  try {
    playlist = JSON.parse(video.dataset.videos);
    if (!Array.isArray(playlist) || playlist.length === 0) {
      console.warn('index-bg.js: playlist inválida o vacía');
      return;
    }
  } catch (err) {
    console.error('index-bg.js: error parseando data-videos', err);
    return;
  }

  let index = 0;
  let isSwitching = false;

  function resetSwitching() {
    video.style.opacity = 1;
    setTimeout(() => {
      isSwitching = false;
    }, 300);
  }

  function applySourceAndPlay(src) {
    const firstSource = video.querySelector('source');

    try {
      if (firstSource) {
        firstSource.src = src;
        video.load();
      } else {
        video.src = src;
      }
    } catch (e) {
      console.error('index-bg.js: error al configurar el video', e);
    }

    const playPromise = video.play();

    if (playPromise && typeof playPromise.then === 'function') {
      playPromise
        .catch((err) => {
          console.warn('index-bg.js: error al reproducir video', err);
        })
        .finally(resetSwitching);
    } else {
      resetSwitching();
    }
  }

  function setSourceAndPlay(src) {
    if (!src || isSwitching) return;
    isSwitching = true;

    video.style.transition = 'opacity 0.6s ease';
    video.style.opacity = 0;

    setTimeout(() => applySourceAndPlay(src), 600);
  }

  function next() {
    index = (index + 1) % playlist.length;
    setSourceAndPlay(playlist[index]);
  }

  video.addEventListener('ended', next);

  video.addEventListener('error', (e) => {
    console.warn('index-bg.js: error en video, avanzando al siguiente.', e);
    next();
  });

  document.addEventListener('visibilitychange', () => {
    if (document.hidden) {
      try {
        video.pause();
      } catch (e) {
        console.warn('index-bg.js: error al pausar video', e);
      }
    } else {
      video.play().catch((err) => {
        console.warn('index-bg.js: error al reanudar video', err);
      });
    }
  });

  setSourceAndPlay(playlist[index]);
});
