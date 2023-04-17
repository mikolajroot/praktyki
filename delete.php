<?php
// Połącz się z bazą danych
$conn = mysqli_connect('localhost', 'root', '', 'inf');

// Sprawdź, czy nie ma błędów
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}

// Pobierz ID użytkownika z parametru URL
$id = $_GET['id'];

// Usuń użytkownika z bazy danych
$sql = "DELETE FROM users WHERE id = $id";
mysqli_query($conn, $sql);

// Zamknij połączenie z bazą danych
mysqli_close($conn);

// Przekierowanie z powrotem do panelu administracyjnego
header('Location: admin.php');
exit();
?>
