<?php
// Get the data from the form submission
$question_id = $_POST['pytanie_id'];
$answer = $_POST['odpowiedz'];

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'inf');

// Check for errors
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Insert the answer into the database
$sql = "INSERT INTO answers (question_id, answer) VALUES ('$question_id', '$answer')";
if (mysqli_query($conn, $sql)) {
    header('Location: Q&A.php');
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);



?>