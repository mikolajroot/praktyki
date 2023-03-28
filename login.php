<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="form-container">
      <h2>Zaloguj się</h2>
      <form id="login-form" onsubmit="return validateForm()">
        <div class="form-group">
          <label for="username">Nazwa użytkownika:</label>
          <input type="text" id="username" name="username">
          <span id="username-error" class="error-message"></span>
        </div>
        <div class="form-group">
          <label for="password">Hasło:</label>
          <input type="password" id="password" name="password">
          <span id="password-error" class="error-message"></span>
        </div>
        <input type="submit" value="zaloguj się">
      </form>
    </div>
    <script src="login.js"></script>
  </body>
</html>
