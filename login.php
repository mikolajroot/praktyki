<?php
session_start();

$host = "localhost"; // replace with your host name
$user = "root"; // replace with your database username
$password = ""; // replace with your database password
$database = "inf"; // replace with your database name

$con = mysqli_connect($host, $user, $password, $database);
 if($con->connect_errno!=0){
    echo "Error: ".$con->connect_errno;
 }
 else{
    $username = $_POST['username-login'];
    $password = $_POST['password-login'];

    $sql = "SELECT * FROM users WHERE username='$username' AND pass='$password'";

    if($result = @$con->query($sql)){
        $ile_userow = $result->num_rows;
        if($ile_userow>0){
            $wiersz = $result->fetch_assoc();
            $_SESSION['user'] = $wiersz['username'];


            $result->free_result();
            header('Location: main.php');

            echo $user;
        } else {

        }
    }

    $con->close();
 }
 
 
 
 ?>