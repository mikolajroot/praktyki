<?php
session_start();
?>
<!DOCTYPE html>
<html lang-="pl">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Kalkulator IP</title>
    <link rel="stylesheet" href="kalkulator.css">
    <script src="kalkulator.js"></script>
  </head>
  <body>
    <header>
      <h1><a href="main.php" target="_self">INF.02</a></h1>
      <nav>
        <ul>
          <li><a href="kalkulator.php" target="_self">Ip calculator</a></li>
        </ul>
      </nav>
      <div class="user-actions">
      <?php
          echo "<p>Witaj ". $_SESSION['user']." !</p>"
      ?>
      </div>
    </header>
    <main>
        <form>
            <label for="ip">Adres IP:</label>
            <input type="text" id="ip" name="ip"><br>
      
            <label for="mask">Maska sieciowa:</label>
            <input type="text" id="mask" name="mask"><br>
      
            <input type="button" value="Oblicz" onclick="calculate()">
          </form>
      
          <p>Wynik:</p>
          <p id="result"></p>
      
    </main>
    <footer>
      <p>Copyright © 2023</p>
    </footer>
  </body>
</html>
