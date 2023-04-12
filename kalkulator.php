<?php
session_start();

if (!isset($_SESSION['zalogowany'])) {
  header('Location: index.php');
  exit();
}

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
    <h1>IP Address calculator</h1>
    <input type='text' class='addr' id='q1'> .
    <input type='text' class='addr' id='q2'> .
    <input type='text' class='addr' id='q3'> .
    <input type='text' class='addr' id='q4'> /
    <input type='text' class='addr' id='cidr'>
    <button onclick='calculate();'>Calculate</button>

    <hr>
    <div class='result'>
      <span class=label>Adres IP :</span>
      <span class=value id=resIP></span>
    </div>
    <div class='result'>
      <span class=label>Maska :</span>
      <span class=value id=resMask></span>
    </div>
    <div class='result'>
      <span class=label>Adres sieci:</span>
      <span class=value id=resNet></span>
    </div>
    <div class='result'>
      <span class=label>Adres rozgłoszeniowy:</span>
      <span class=value id=resBC></span>
    </div>
    <div class='result'>
      <span class=label>Klasa:</span>
      <span class=value id=resClass></span>
    </div>
    <div class='result'>
      <span class=label>Zakres:</span>
      <span class=value id=resRange></span>
    </div>
    <div class='result'>
      <span class=label>Adres IP binary:</span>
      <span class=value id=resBinIP></span>
    </div>
    <div class='result'>
      <span class=label>Maska binary:</span>
      <span class=value id=resBinMask></span>
    </div>
    <div class='result'>
      <span class=label>Adres sieci binary:</span>
      <span class=value id=resBinNet></span>
    </div>
    <div class='result'>
      <span class=label>BC Adres binary:</span>
      <span class=value id=resBinBC></span>
    </div>

    <script type='text/javascript'>
      function calculate() {
        //pobieranie wartości z inputów
        var q1 = document.getElementById('q1').value;
        var q2 = document.getElementById('q2').value;
        var q3 = document.getElementById('q3').value;
        var q4 = document.getElementById('q4').value;
        var cidr = document.getElementById('cidr').value;
        //validacja danych
        if (
          (q1 >= 0 && q1 <= 255) &&
          (q2 >= 0 && q2 <= 255) &&
          (q3 >= 0 && q3 <= 255) &&
          (q4 >= 0 && q4 <= 255) &&
          (cidr >= 0 && cidr <= 32)
        ) {
          //wyśiwetlanie adresu IP
          document.getElementById('resIP').innerHTML = q1 + "." + q2 + "." + q3 + "." + q4;

          //pobrać wartości z inputów i przekonwertowanie na binarny
          var ipBin = {};
          ipBin[1] = String("00000000" + parseInt(q1, 10).toString(2)).slice(-8);
          ipBin[2] = String("00000000" + parseInt(q2, 10).toString(2)).slice(-8);
          ipBin[3] = String("00000000" + parseInt(q3, 10).toString(2)).slice(-8);
          ipBin[4] = String("00000000" + parseInt(q4, 10).toString(2)).slice(-8);

          
          var standartClass = "";
          if (q1 <= 126) {
            standartClass = "A";
          } else if (q1 == 127) {
            standartClass = "loopback IP"
          } else if (q1 >= 128 && q1 <= 191) {
            standartClass = "B";
          } else if (q1 >= 192 && q1 <= 223) {
            standartClass = "C";
          } else if (q1 >= 224 && q1 <= 239) {
            standartClass = "D (Multicast Address)";
          } else if (q1 >= 240 && q1 <= 225) {
            standartClass = "E (Experimental)";
          } else {
            standartClass = "Out of range";
          }

          //Maska
          var mask = cidr;
          var importantBlock = Math.ceil(mask / 8);
          var importantBlockBinary = ipBin[importantBlock];
          var maskBinaryBlockCount = mask % 8;
          if (maskBinaryBlockCount == 0) importantBlock++;
          var maskBinaryBlock = "";
          var maskBlock = "";
          for (var i = 1; i <= 8; i++) {
            if (maskBinaryBlockCount >= i) {
              maskBinaryBlock += "1";
            } else {
              maskBinaryBlock += "0";
            }
          }
          //konwersja maski binarnej na dziesiętną
          maskBlock = parseInt(maskBinaryBlock, 2);

          //net & broadcast addr
          var netBlockBinary = "";
          var bcBlockBinary = "";
          for (var i = 1; i <= 8; i++) {
            if (maskBinaryBlock.substr(i - 1, 1) == "1") {
              netBlockBinary += importantBlockBinary.substr(i - 1, 1);
              bcBlockBinary += importantBlockBinary.substr(i - 1, 1);
            } else {
              netBlockBinary += "0";
              bcBlockBinary += "1";
            }
          }

          //połączyenie wszystkiego razem
          var mask = "";
          var maskBinary = "";
          var net = "";
          var bc = "";
          var netBinary = "";
          var bcBinary = "";
          var rangeA = "";
          var rangeB = "";
          //pętla do ułeżenia wszystkich stringó razem
          for (var i = 1; i <= 4; i++) {
            if (importantBlock > i) {
              
              mask += "255";
              maskBinary += "11111111";
              netBinary += ipBin[i];
              bcBinary += ipBin[i];
              net += parseInt(ipBin[i], 2);
              bc += parseInt(ipBin[i], 2);
              rangeA += parseInt(ipBin[i], 2);
              rangeB += parseInt(ipBin[i], 2);
            } else if (importantBlock == i) {
              
              mask += maskBlock;
              maskBinary += maskBinaryBlock;
              netBinary += netBlockBinary;
              bcBinary += bcBlockBinary;
              net += parseInt(netBlockBinary, 2);
              bc += parseInt(bcBlockBinary, 2);
              rangeA += (parseInt(netBlockBinary, 2) + 1);
              rangeB += (parseInt(bcBlockBinary, 2) - 1);
            } else {
              
              mask += 0;
              maskBinary += "00000000";
              netBinary += "00000000";
              bcBinary += "11111111";
              net += "0";
              bc += "255";
              rangeA += 0;
              rangeB += 255;
            }
          
            if (i < 4) {
              mask += ".";
              maskBinary += ".";
              netBinary += ".";
              bcBinary += ".";
              net += ".";
              bc += ".";
              rangeA += ".";
              rangeB += ".";
            }
          }
          //Wyświetlanie wyników
          document.getElementById('resMask').innerHTML = mask;
          document.getElementById('resNet').innerHTML = net;
          document.getElementById('resBC').innerHTML = bc;
          document.getElementById('resRange').innerHTML = rangeA + " - " + rangeB;
          document.getElementById('resBinIP').innerHTML = ipBin[1] + "." + ipBin[2] + "." + ipBin[3] + "." + ipBin[4];
          document.getElementById('resBinMask').innerHTML = maskBinary;
          document.getElementById('resBinNet').innerHTML = netBinary;
          document.getElementById('resBinBC').innerHTML = bcBinary;
          document.getElementById('resClass').innerHTML = standartClass;
        } else {
          alert("invalid value");
        }
      }
    </script>
  </main>
  <footer>
    <p>Copyright © 2023</p>
  </footer>
</body>

</html>