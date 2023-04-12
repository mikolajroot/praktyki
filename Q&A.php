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
            <li>
                <p><strong>Pytanie:</strong> Ile unikalnych hostów ma klasa sieci C</p>
                <p><strong>Odpowiedź:</strong> Ma ona 254 unikalnych hostów</p>
            </li>
            <li>
                <p><strong>Pytanie:</strong> Co to broadcast</p>
                <p><strong>Odpowiedź:</strong> Broadcast jest to rozsiewczy tryb transmisji danych polegający na wysyłaniu przez jeden port pakietów, które powinny być odebrane przez wszystkie pozostałe porty przyłączone do danej sieci.</p>
            </li>
        </ul>

        <h2>Panel administratora</h2>
        <form method="post" action="dodaj_odpowiedz.php">
            <label for="pytanie_id">Wybierz pytanie:</label>
            <select id="pytanie_id" name="pytanie_id">
                <option value="1">Ile unikalnych hostów ma klasa sieci C</option>
                <option value="2">Co to broadcast</option>
            </select><br>
            <label for="odpowiedz">Dodaj odpowiedź:</label>
            <textarea id="odpowiedz" name="odpowiedz"></textarea><br>
            <input type="submit" value="Dodaj odpowiedź">
        </form>
    </main>
    <footer>
        <p>Copyright © 2023</p>
    </footer>
</body>

</html>