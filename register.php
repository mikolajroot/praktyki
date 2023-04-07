<?php
session_start();
$host = "localhost"; 
$user = "root";
$password = ""; 
$database = "inf";

$con = mysqli_connect($host, $user, $password, $database);

if(isset($_POST['username-register']) && isset($_POST['password-register']) && isset($_POST['password-repeat'])) {

  $username = $_POST['username-register'];
  $password = $_POST['password-register'];
  $passwordRepeat = $_POST['password-repeat'];

  // Sprawdź czy nazwa użytkownika już istnieje
  $checkUsernameQuery = "SELECT * FROM users WHERE username='$username'";
  $checkUsernameResult = mysqli_query($con, $checkUsernameQuery);

  if(mysqli_num_rows($checkUsernameResult) > 0) {
    // Jeżeli nazwa użytkownika istnieje, pokaż komunikat o błędzie
    $_SESSION['usernameExist'] = true;
    header("Location: registerMain.php");
    exit();
  }

  // Jeśli nazwa użytkownika nie istnieje, kontynuuj rejestrację
  if($password == $passwordRepeat) {
    

    $insertQuery = "INSERT INTO users (username, pass) VALUES ('$username', '$password')";
    $result = mysqli_query($con, $insertQuery);

    if($result) {
      // Registration successful, redirect to login page
      header("Location: login.php?registration=success");
      exit();
    } else {
      echo "Error: " . $insertQuery . "<br>" . mysqli_error($con);
      exit();
    }
  } else {
    echo "Hasła nie są zgodne!";
    exit();
  }
} else {
  header("Location: login.php");
  exit();
}
?>