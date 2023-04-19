<?php
$conn = mysqli_connect('localhost', 'root', '', 'inf');

// Check for errors
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
$pytanie = $_POST['pytanie'];
// Query all users
$sql = "INSERT INTO questions (question) VALUES ('$pytanie')";
$result = mysqli_query($conn, $sql);

if ($result) {
    header('Location: Q&A.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);

}
// Close database connection
mysqli_close($conn);
?>