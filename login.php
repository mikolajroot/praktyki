<?php
session_start();

if (!isset($_POST["username-login"]) || !isset($_POST["password-login"])) {
    header("Location: index.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$database = "inf";

$con = mysqli_connect($host, $user, $password, $database);
if ($con->connect_errno != 0) {
    echo "Error: " . $con->connect_errno;
} else {
    $username = $_POST['username-login'];
    $password = $_POST['password-login'];

    $username = htmlentities($username, ENT_QUOTES, "UTF-8");
    $password = htmlentities($password, ENT_QUOTES, "UTF-8");

    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$password'";

    if ($result = @$con->query($sql)) {
        $ile_userow = $result->num_rows;
        if ($ile_userow > 0) {
            if ($username == "admin" && $password == "admin") {
                $_SESSION['admin'] = true;
                $_SESSION['zalogowany'] = true;

                $wiersz = $result->fetch_assoc();
                $_SESSION['id'] = $wiersz['id'];
                $_SESSION['user'] = $wiersz['username'];


                $result->free_result();
                header('Location: main.php');
            } else {
                $_SESSION['admin'] = false;
                $_SESSION['zalogowany'] = true;

                $wiersz = $result->fetch_assoc();
                $_SESSION['id'] = $wiersz['id'];
                $_SESSION['user'] = $wiersz['username'];


                $result->free_result();
                header('Location: main.php');
            }
        } else {

            $_SESSION['error'] = '<script>alert("Nieprawidłowy login lub hasło")</script>';
            header('Location: index.php');
        }
    }

    $con->close();
}
