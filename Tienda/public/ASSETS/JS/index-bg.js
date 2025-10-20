document.addEventListener('DOMContentLoaded', () => {
  const video = document.getElementById('indexBgVideo');
  if (!video) return;

  try { video.loop = false; } catch (e) {}

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

  function setSourceAndPlay(src) {
    if (!src) return;

    if (isSwitching) return;
    isSwitching = true;

    video.style.transition = 'opacity 0.6s ease';
    video.style.opacity = 0;

    setTimeout(() => {

      const firstSource = video.querySelector('source');
      if (firstSource) {
        firstSource.src = src;

        try {
          video.load();
        } catch (e) {}
      } else {

        try {
          video.src = src;
        } catch (e) {}
      }

      const playPromise = video.play();

      if (playPromise && typeof playPromise.then === 'function') {
        playPromise.catch(() => {}).finally(() => {
          video.style.opacity = 1;
          setTimeout(() => { isSwitching = false; }, 300);
        });
      } else {

        video.style.opacity = 1;
        setTimeout(() => { isSwitching = false; }, 300);
      }
    }, 600);
  }

  function next() {
    index = (index + 1) % playlist.length;
    setSourceAndPlay(playlist[index]);
  }

  video.addEventListener('ended', () => {
    next();
  });

  video.addEventListener('error', (e) => {
    console.warn('index-bg.js: error en video, avanzando al siguiente.', e);
    next();
  });

  document.addEventListener('visibilitychange', () => {
    if (document.hidden) {
      try { video.pause(); } catch (e) {}
    } else {
      video.play().catch(() => {});
    }
  });

  setSourceAndPlay(playlist[index]);
});
