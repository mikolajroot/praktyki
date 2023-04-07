<?php
session_start();

if(!isset($_SESSION['zalogowany'])){
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
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <h1><a href="main.php" target="_self">INF.02</a></h1>
      <nav>
        <ul>
          <li><a href="kalkulator.php" target="_self">Ip kalkulator</a></li>
          <li><a href="teoria.php" target="_self">Teoria</a></li>
          <li><a href="#" target="_self">Egzamin</a></li>
          <li><a href="#" target="_self">Q&A</a></li>
          <li><a href="#" target="_self">Admin</a></li>
        </ul>
      </nav>
      <div class="user-actions">
        <?php
          if (isset($_SESSION['admin']) && $_SESSION['admin']==true) {
            echo "<p>ADMIN</p>";
            echo "<p><a href='logout.php'>Wyloguj się</a></p>";
          }
          else {
            echo "<p>Witaj ". $_SESSION['user']." ! </p>";
          echo "<p><a href='logout.php'>Wyloguj się</a></p>";
          }
        ?>
      </div>
    </header>
    <main>
      <img src="sieci.jpg" alt="sieci.jpg">
    </main>
    <footer>
      <p>Copyright © 2023</p>
    </footer>
  </body>
</html>
