<?php
    $con = mysqli_connect("localhost","root","","sk_db");
    // if ($con -> connect_errno) {
    //     echo "Failed to connect to MySQL: " . $con -> connect_error;
    //     exit();
    //   }else{

    //     echo "Połączenie działa.";
    //   }
?>
<!doctype html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wyniki wyszukiwania</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
  <header  class=" d-flex justify-content-center border-bottom border-light align-items-center flex-wrap" >
    
    <h1 class="w-25 mx-5 my-5 text-wrap text-center">Szybka Książka</h1>
    <img class="w-25" src="img/LOGO - Copy.png" alt="Logo witryny">
    
  <nav class="nav d-flex justify-content-center align-items-center w-50 mb-5">
  <a class=" rounded nav-link border border-white active me-5 my-2 text-white" aria-current="page" href="index.php">Strona główna</a>
  <a class="rounded nav-link border border-white me-5 my-2 text-white" href="wyszukiwanie.php">Wyszukiwanie</a>
  <a class="rounded nav-link border border-white  my-2 text-white" href="spis_ksiegarni.php">Spis księgarni</a>
  <!-- <form class="d-flex justify-content-center align-items-center " action="wynik.php" method="get" role="search">
        <input name="title" class="form-control me-5" type="search" placeholder="Tytuł" aria-label="Search">
        <button  class="bg-black text-white border-white border rounded" type="submit">Szukaj po tytule</button>
      </form> -->
</nav>
</header>
    <main class="mb-5"> 
    <h2 class='ms-5 mt-2'>Wyniki wyszukiwania:</h2>
    <?php
      if(empty($_GET['title'])){
        echo "Podaj tytuł książki.";
        header("Refresh:2; url=wyszukiwanie.php");
      }else{
        if(empty($_get['miasto'])){

          $zapytanie_q = "select ksiazka.tytul,ksiegarnie.nazwa as ks_n, wojewodztwa.nazwa as woj_n, miasta.nazwa as m_n, ksiegarnie.ulica, ksiegarnie.kod_pocztowy, ksiegarnie.mapa from ksiazka join ksiegarnia_ksiazka on ksiegarnia_ksiazka.id_ksiazki = ksiazka.id_ksiazki join ksiegarnie on ksiegarnie.id_ksiegarni = ksiegarnia_ksiazka.id_ksiegarni join miasta on miasta.id_miasta = ksiegarnie.id_miasta join wojewodztwa on wojewodztwa.id_woj = miasta.id_woj having ksiazka.tytul like" . "'%" . $_GET['title'] . "%'";

        }else{
          $zapytanie_q = "select ksiazka.tytul,ksiegarnie.nazwa as ks_n, wojewodztwa.nazwa as woj_n, miasta.nazwa as m_n, ksiegarnie.ulica, ksiegarnie.kod_pocztowy, ksiegarnie.mapa from ksiazka join ksiegarnia_ksiazka on ksiegarnia_ksiazka.id_ksiazki = ksiazka.id_ksiazki join ksiegarnie on ksiegarnie.id_ksiegarni = ksiegarnia_ksiazka.id_ksiegarni join miasta on miasta.id_miasta = ksiegarnie.id_miasta join wojewodztwa on wojewodztwa.id_woj = miasta.id_woj having ksiazka.tytul like" . "'%" . $_GET['title'] . "%' and m_n like '%" . $_GET['miasto'] . "%'" ;


        }
        $ksiazki = $con->query($zapytanie_q);
        echo "<table class='table'><tr><th scope='col'>Tytuł książki</th><th scope='col'>Nazwa Księgarni</th><th scope='col'>Województwo</th><th scope='col'>Miasto</th><th scope='col'>Ulica</th><th scope='col'>Kod pocztowy</th><th scope='col'>Adres do map Google</th></tr>";
        while($rekord = $ksiazki->fetch_assoc()){
            
            echo "<tr><td>" . $rekord['tytul'] . "</td>";
            echo "<td>" . $rekord['ks_n'] . "</td>";
            echo "<td>" . $rekord['woj_n'] . "</td>";
            echo "<td>" . $rekord['m_n'] . "</td>";
            echo "<td>" . $rekord['ulica'] . "</td>";
            echo "<td>" . $rekord['kod_pocztowy'] . "</td>";
            // echo "<td>" . $rekord['mapa'] . "</td>";
            echo "<td>" . "<a href='" .$rekord['mapa'] . "' target='_blank' class='rounded border border-black text-black ms-5 p-2'>" . "Pokaż na mapie</a>" . "</td>";
            echo "</tr>";
        }
        echo "</table>";
      }
?>
 


 
    </main>
    
    <footer class="border-top border-white"><h5 class="text-center mt-2">&copy;SK_Dev-Team</h5></footer>
  </body>
</html>
    

