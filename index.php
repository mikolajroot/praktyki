<?php
session_start();

if (isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany'] == true)) {
    header('Location: main.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="form-container">
      <h2>Zaloguj się</h2>
      <form id="login-form" onsubmit="return validateForm()" action="login.php" method="post">
        <div class="form-group">
          <label for="username">Nazwa użytkownika:</label>
          <input type="text" id="username" name="username-login">
          <span id="username-error" class="error-message"></span>
        </div>
        <div class="form-group">
          <label for="password">Hasło:</label>
          <input type="password" id="password" name="password-login">
          <span id="password-error" class="error-message"></span>
          <?php
            if(isset($_SESSION['error'])){
              echo $_SESSION['error'];
              unset($_SESSION['error']);
            }
            ?>
        </div>
        <input type="submit" value="zaloguj się">
        <input type="reset" value="Reset" id="reset">
        <a href="register.html">zajerestruj się </a>
      </form>
    <script src="login.js"></script>
  </body>
</html>
