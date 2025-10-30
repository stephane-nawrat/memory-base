// public/assets/js/errorplayer.js
// Fait disparaître le message d'erreur après 3 secondes avec un fondu

document.addEventListener("DOMContentLoaded", () => {
  const msg = document.getElementById("error-message");
  if (msg) {
    setTimeout(() => {
      msg.style.transition = "opacity 0.5s ease";
      msg.style.opacity = "0";
      setTimeout(() => msg.remove(), 500);
    }, 3000);
  }
});
