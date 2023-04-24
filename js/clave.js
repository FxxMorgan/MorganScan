const form = document.querySelector('form');
const passwordInput = document.querySelector('#password-input');
const content = document.querySelector('#content');
const errorMessage = document.createElement('p');

form.addEventListener('submit', (event) => {
  event.preventDefault();
  
  if (passwordInput.value === 'contraseña') {
    content.style.display = 'block';
    form.style.display = 'none';
  } else {
    errorMessage.textContent = 'La contraseña es incorrecta. Intente nuevamente.';
    form.appendChild(errorMessage);
  }
});
