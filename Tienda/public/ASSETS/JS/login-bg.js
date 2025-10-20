const playlist = [
  '../assets/video/kawasaki-z1100.mp4',
  '../assets/video/login3.mp4',
  '../assets/video/login4.mp4',
  '../assets/video/login2.mp4'
];

document.addEventListener('DOMContentLoaded', function() {
  const video = document.getElementById('bgVideo');
  let index = 0;

  function setSourceAndPlay(i) {
    if (!playlist[i]) return;
    if (video.src.endsWith(playlist[i])) {
      const playPromise = video.play();
      if (playPromise !== undefined) playPromise.catch(() => {});
      return;
    }
    video.src = playlist[i];
    video.load();
    const playPromise = video.play();
    if (playPromise !== undefined) playPromise.catch(() => {});
  }

  video.addEventListener('ended', function() {
    index = (index + 1) % playlist.length;
    setSourceAndPlay(index);
  });

  video.addEventListener('error', function() {
    index = (index + 1) % playlist.length;
    setSourceAndPlay(index);
  });

  if (!playlist.length) return;
  setSourceAndPlay(index);

  document.addEventListener('visibilitychange', function() {
    if (document.hidden) {
      video.pause();
    } else {
      const playPromise = video.play();
      if (playPromise !== undefined) playPromise.catch(() => {});
    }
  });
});
