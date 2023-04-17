<?php
session_start();

if (!isset($_SESSION['zalogowany'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktyki</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <header>
        <h1><a href="main.php" target="_self">INF.02</a></h1>
        <nav>
            <ul>
                <li><a href='admin.php' target='_self'>Admin</a></li>
            </ul>
        </nav>
        <div class="user-actions">
            <?php
            if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
                echo "<p>ADMIN</p>";
                echo "<p><a href='logout.php'>Wyloguj się</a></p>";
            } else {
                echo "<p>Witaj " . $_SESSION['user'] . " ! </p>";
                echo "<p><a href='logout.php'>Wyloguj się</a></p>";
            }
            ?>
        </div>
    </header>
    <main>
        <h1>Panel administracyjny</h1>
        <table>
            <tr>
                <th>username</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
            <?php
            // connect to database
            $conn = mysqli_connect('localhost', 'root', '', 'inf');

            // Check for errors
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            // Query all users
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);

            // Display users in a table
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['username'] !== 'admin') {
                    echo "<tr>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['pass'] . "</td>";
                    echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
                    echo "</tr>";
                }
            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </table>
    </main>


    <footer>
        <p>Copyright © 2023</p>
    </footer>

</body>

</html>