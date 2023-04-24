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
    <link rel="stylesheet" href="Q&A.css">
</head>

<body>
    <header>
        <h1><a href="main.php" target="_self">INF.02</a></h1>
        <nav>
            <ul>
                <li><a href="Q&A.php" target="_self">Q&A</a></li>
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
        <h1>Witaj na stronie z pytaniami i odpowiedziami</h1>
        <h2>Zadaj pytanie</h2>
        <form method="post" action="dodaj_pytanie.php">
            <label for="pytanie">Twoje pytanie:</label>
            <textarea id="pytanie" name="pytanie"></textarea><br>
            <input type="submit" value="Zadaj pytanie"><br>
        </form>

        <h2>Zadane pytania i odpowiedzi</h2>
        <ul>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'inf');

            // Check for errors
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            // Query all users
            $sql = "SELECT questions.question, answers.answer
                FROM questions
                JOIN answers ON questions.id = answers.question_id";
            $result = mysqli_query($conn, $sql);

            // Display users in a table
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>";
                echo "<p><strong>Pytanie:</strong> " . $row['question'] . "</p>";
                echo "<p><strong>Odpowiedź:</strong>" . $row['answer'] . "</p>";
                echo "</li>";
            }

            ?>

        </ul>
        <?php
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
            echo "<h2>Panel administratora</h2>";
            echo "<form method='post' action='dodaj_odpowiedz.php'>";
            echo "<label for='pytanie_id'>Wybierz pytanie:</label>";
            echo "<select id='pytanie_id' name='pytanie_id'>";
            $conn = mysqli_connect('localhost', 'root', '', 'inf');

            // Check for errors
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

            // Query all users
            $sql = "SELECT * FROM questions";
            $result = mysqli_query($conn, $sql);

            // Display users in a table
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row['username'] !== 'admin') {
                    echo "<option value='" . $row['id'] . "'>" . $row['question'] . "</option>";
                }
            }
            echo "</select><br>";
            echo "<label for='odpowiedz'>Dodaj odpowiedź:</label>";
            echo "<textarea id='odpowiedz' name='odpowiedz'></textarea><br>";
            echo "<input type='submit' value='Dodaj odpowiedź'>";
            echo "</form>";
        }
        ?>


    </main>
    <footer>
        <p>Copyright © 2023</p>
    </footer>
</body>

</html>