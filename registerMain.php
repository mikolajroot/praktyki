<?php
session_start();
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
    <h2>Zarejestruj się</h2>
    <form id="login-form" onsubmit="return validateForm()" action="register.php" method="post">
      <div class="form-group">
        <label for="username">Nazwa użytkownika:</label>
        <input type="text" id="username" name="username-register">
        <span id="username-error" class="error-message"></span>
      </div>
      <div class="form-group">
        <label for="password">Hasło:</label>
        <input type="password" id="password" name="password-register">
        <span id="password-error" class="error-message"></span>
      </div>
      <div class="form-group">
        <label for="password">Powtórz hasło:</label>
        <input type="password" id="password-repeat" name="password-repeat">
        <span id="password-repeat-error" class="error-message"></span>
        <?php
        if (isset($_SESSION['usernameExist'])) {
          echo '<script>alert("Użytkownik o takiej nazwie już istnieje");</script>';
          unset($_SESSION['usernameExist']);
        }
        ?>
      </div>
      <input type="submit" value="zajerestruj się">
      <input type="reset" value="Reset" id="reset">
    </form>
   
  </div>
  <script src="register.js"></script>
</body>

</html>