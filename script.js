// toglle clas aktif
const navbarNav = document.querySelector(".navbar-nav");

// ketika hamburger-menu di klik

document.querySelector("#hamburger-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

// klik diluar sidebar untuk hilangin nav

const hamburger = document.querySelector("#hamburger-menu");

document.addEventListener("click", function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});
  const audio = document.getElementById('bgMusic');
  const allVideos = document.querySelectorAll('.menu-card-img');

  allVideos.forEach(video => {
    // Ketika salah satu video diputar
    video.addEventListener('play', () => {
      audio.pause();
    });

    // Ketika video di-pause atau selesai
    video.addEventListener('pause', () => {
      audio.play();
    });
    
    video.addEventListener('ended', () => {
      audio.play();
    });
  });