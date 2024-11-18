<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj miejscowość</title>
</head>
<body>
    <form action="" method="POST">
        <label for="nazwa">Nazwa</label>    
        <input type="text" name="nazwa" id="">
        <label for="woj">Id województwa:</label>
        <input type="number" name="woj" id="">

        <button type="submit">Dodaj</button>
        <button type="reset">Wyczyść</button>

    </form>

    <?php
    $con = mysqli_connect("localhost","root","","sk_db");
    if ($con -> connect_errno) {
        echo "Failed to connect to MySQL: " . $con -> connect_error;
        exit();
      }else{

        echo "Połączenie działa.";
      }

      if (isset($_POST['nazwa'])) {
        $sql_q = "insert into miasta values(null, " . "'" .$_POST['nazwa'] . "'," . $_POST['woj'] . ")" ;
        if ($con->query($sql_q) === TRUE) {
            echo '<br>';
            echo "Rekord dodano pomyślnie";
          } else {
            echo '<br>';
            echo "Błąd zapytania: " . $sql_q . "<br>" . $con->error;
          }
      }
    
    
    ?>
</body>
</html>