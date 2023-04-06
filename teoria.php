<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktyki</title>
    <link rel="stylesheet" href="teoria.css">
</head>
<body>
    <header>
      <h1><a href="main.php" target="_self">INF.02</a></h1>
      <nav>
        <ul>
          <li><a href="teoria.php" target="_self">Teoria</a></li>
        </ul>
      </nav>
      <div class="user-actions">
      <?php
          echo "<p>Witaj ". $_SESSION['user']." !</p>"
        ?>
      </div>
    </header>
    <main>
      <h1>Materiały do nauki z egzaminu INF02</h1>
    <p>PLACEHOLDER NA COS</p>
    <h2>Wymagania egzaminacyjne</h2>
    <p>Przed rozpoczęciem nauki zalecamy zapoznanie się z wymaganiami egzaminacyjnymi, które znajdziesz na stronie internetowej Centralnej Komisji Egzaminacyjnej oraz przeczytanie informacji o możliwość przystąpienia do egzaminu.</p>
    <li>Egzamin zawodowy – Formuła 2019 jest przeprowadzany zgodnie z przepisami ustawy o systemie oświaty w brzmieniu obowiązującym od 1 września 2019 r. i w oparciu o podstawy programowe kształcenia w zawodach szkolnictwa branżowego.

        Do egzaminu zawodowego przystępują uczniowie i słuchacze szkół, w  których kształcenie jest  realizowane zgodnie z podstawami programowymi kształcenia w zawodach szkolnictwa branżowego:
        
        uczniowie branżowych szkół I stopnia niebędący młodocianymi pracownikami,
        uczniowie branżowych szkół I stopnia będący młodocianymi pracownikami zatrudnionymi w celu przygotowania zawodowego u pracodawcy niebędącego rzemieślnikiem,
        uczniowie techników,
        słuchacze szkół policealnych,
        słuchacze branżowych szkół II stopnia.
        Uczniowie i słuchacze są informowani przez dyrektora szkoły o obowiązku przystąpienia do egzaminu zawodowego odpowiednio w danym roku szkolnym lub danym semestrze, nie później niż w terminie 10 dni od dnia rozpoczęcia danego roku szkolnego lub danego semestru.
        
        Przystąpienie ucznia i słuchacza do egzaminu zawodowego we wskazanym przez dyrektora szkoły odpowiednio roku szkolnym lub semestrze jest jednym z warunków uzyskania promocji do następnej klasy, na następny semestr lub ukończenia szkoły.
        
         
        
        Do egzaminu zawodowego mogą również przystąpić:
        
        uczniowie branżowych szkół I stopnia będący młodocianymi pracownikami zatrudnionymi w celu przygotowania zawodowego u pracodawcy będącego rzemieślnikiem, którzy realizowali podstawę programową kształcenia w zawodzie szkolnictwa branżowego;
        absolwenci branżowych szkół I stopnia, branżowych szkół II stopnia, techników i szkół policealnych, którzy realizowali podstawę programową kształcenia w zawodzie szkolnictwa branżowego;
        osoby, które ukończyły kwalifikacyjny kurs zawodowy, prowadzony w oparciu o podstawę programową kształcenia w zawodzie szkolnictwa branżowego;
        osoby dorosłe, które ukończyły praktyczną naukę zawodu dorosłych lub przyuczenie do pracy dorosłych, o których mowa odpowiednio w art. 53c i art. 53d ustawy z dnia 20 kwietnia 2004 r. o promocji zatrudnienia i instytucjach rynku pracy (Dz. U. z 2018 r. poz. 1265, ze zm.), jeżeli program przyuczenia do pracy uwzględniał wymagania określone w podstawie programowej kształcenia w zawodzie szkolnictwa branżowego;
        osoby spełniające warunki dopuszczenia do egzaminu eksternistycznego zawodowego określone w przepisach wydanych na podstawie art. 10 ust. 5 ustawy o systemie oświaty, które złożyły wniosek o dopuszczenie do tego egzaminu po dniu 31 stycznia 2021 roku;</li>
    <a href="https://cke.gov.pl/images/_EGZAMIN_ZAWODOWY/Formula_2019/Informatory/technik_informatyk.pdf">Wymagania egzaminacyjne INF02</a>
    <h2>Przykładowe arkusze egzaminacyjne</h2>
    <ul>
      <li><a href="https://cke.gov.pl/images/_EGZAMIN_ZAWODOWY/Formula_2019/Przykladowe_zadania/inf_02.pdf">Arkusz egzaminacyjny INF02 - 2019, część praktyczna</a></li>
      <li><a href="https://cke.gov.pl/images/_EGZAMIN_ZAWODOWY/arkusze_2017/pisemna/ee_08_2020_01_SG_kolor.pdf">Arkusz egzaminacyjny INF02 - 2017, część pisemna</a></li>
    </ul>
    <h2>Materiały edukacyjne online</h2>
    <ul>
        <li><a href="https://www.netacad.com/">Wirtualne sieci</a></li>
      <li><a href="https://pasja-informatyki.pl/sieci-komputerowe/">Sieci komputerowe</a></li>
    </ul>
    </main>
    <footer>
      <p>Copyright © 2023</p>
    </footer>
</body>
</html>