const cookieConsent = document.getElementById("cookie-consent");
const acceptBtn = document.getElementById("accept-btn");
const rejectBtn = document.getElementById("reject-btn");

// Mostrar ventana emergente
setTimeout(() => {
  cookieConsent.style.display = "block";
}, 2000);

// Aceptar cookies
acceptBtn.addEventListener("click", () => {
  setCookie("cookie_consent", true, 365);
  cookieConsent.style.display = "none";
});

// Rechazar cookies
rejectBtn.addEventListener("click", () => {
  setCookie("cookie_consent", false, 365);
  cookieConsent.style.display = "none";
});

// Función para establecer la cookie
function setCookie(name, value, days) {
  const date = new Date();
  date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
  const expires = "expires=" + date.toUTCString();
  document.cookie = name + "=" + value + ";" + expires + ";path=/";
}
