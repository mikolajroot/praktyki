//skrypt do walidacji formularza logowania
function validateForm() {
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;
  let isValid = true;

  const usernameError = document.getElementById("username-error");
  const passwordError = document.getElementById("password-error");

  usernameError.textContent = "";
  passwordError.textContent = "";

  if (username === "") {
    usernameError.textContent = "Nazwa użytkownika nie może być pusta";
    isValid = false;
  }

  if (password === "") {
    passwordError.textContent = "Hasło nie może być puste";
    isValid = false;
  }

  return isValid;
}
//skrypt do usunięcia błędów po kliknięciu przycisku reset
const resetButton = document.querySelector('input[type="reset"]');
const errorMessages = document.querySelectorAll('.error-message');

resetButton.addEventListener('click', () => {
  errorMessages.forEach(errorMessage => {
    errorMessage.textContent = '';
  });
});
  