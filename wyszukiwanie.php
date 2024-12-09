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
    <title>Wyszukiwanie</title>
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
  <a class="rounded nav-link border border-white me-5 my-2 text-white" href="#">Wyszukiwanie</a>
  <a class="rounded nav-link border border-white  my-2 text-white" href="spis_ksiegarni.php">Spis księgarni</a>
  <!-- <form class="d-flex justify-content-center align-items-center " action="wynik.php" method="get" role="search">
        <input name="title" class="form-control me-5" type="search" placeholder="Tytuł" aria-label="Search">
        <button  class="bg-black text-white border-white border rounded" type="submit">Szukaj po tytule</button>
      </form> -->
</nav>
</header>
    <main class="mb-5"> 
      <h2 class='ms-5 mt-2'>Wyszukiwanie:</h2>
        <div class="d-flex justify-content-center align-items-center flex-wrap">
        <form action="wynik.php" method="get" class="w-25">
            <fieldset><legend class="p-2">Dane książki</legend>
            <div class="d-flex justify-content-center flex-wrap">
            <label for="title" class="w-25">Tytuł książki: </label>
            <input type="text" name="title" id="" class="mb-3">
            </div>
            
            <!-- <label for="">Imię autora:</label>
            <input type="text" name="fname" id="">
            <label for="">Nazwisko autora:</label>
            <input type="text" name="lname" id=""> -->
            </fieldset>
            <fieldset>
              <legend class="p-2">Lokalizacja:</legend>
              <div class="d-flex justify-content-center flex-wrap">
            <label for="miasto" class="w-25">Miasto: </label>
            <input type="text" name="miasto" class="mb-3"id="">
            </div>
            </fieldset>
            <div class="d-flex justify-content-around mt-3 flex-wrap">
            <button type="submit" class="w-25 text-black">Szukaj!</button>
            <button type="reset" class="w-25 text-black">Czyść</button>
            </div>
        </form>
        </div>





 
    </main>
    <footer class="border-top border-white"><h5 class="text-center mt-2">&copy;SK_Dev-Team</h5></footer>
  </body>
</html>