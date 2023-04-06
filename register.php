<?php
// Connect to the database
$host = "localhost"; // replace with your host name
$user = "root"; // replace with your database username
$password = ""; // replace with your database password
$database = "inf"; // replace with your database name

$con = mysqli_connect($host, $user, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Retrieve form data
$username = $_POST['username-register'];
$password = $_POST['password-register'];
$password_repeat = $_POST['password-repeat'];

// Check if password and password repeat match
if ($password != $password_repeat) {
  echo "Hasła nie pasują.";
  exit();
}

// Hash the password for security
// $password_hashed = password_hash($password, PASSWORD_DEFAULT);

// Insert the user into the database
$sql = "INSERT INTO users (username, pass) VALUES ('$username', '$password')";

if (mysqli_query($con, $sql)) {
  echo "User registered successfully.";
  header("Location: index.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>