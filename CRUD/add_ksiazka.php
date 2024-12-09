
<?php
$con = mysqli_connect("localhost","root","","sk_db");
if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
  }else{

    echo "Połączenie działa.";
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj książkę</title>
</head>
<body>
    <form action="" method="POST">
        <label for="nazwa">Tytuł:</label>    
        <input type="text" name="nazwa" id="">
        <label for="autor">Id autora:</label>
        <input type="number" name="autor" id="">

        <button type="submit">Dodaj</button>
        <button type="reset">Wyczyść</button>

    </form>

<table>
<tr>
  <th>Id książki</th>
  <th>Tytuł</th>
  <th>Id autora</th>
</tr>

<?php
// Rekordy:
      $sql_table_q = "select * from ksiazka" ;
      $ksiazki = $con->query($sql_table_q);
      while($rekord = $ksiazki->fetch_assoc()){
        echo "<tr>";
        echo "
        <td>" . $rekord['id_ksiazki'] . "</td>
        <td>" . $rekord['tytul'] . "</td>
        <td>" . $rekord['id_autora'] . "</td>";
        echo "</tr>";
      } 

// ---
?>

</table>
<button><a href="index.php">Powrót</a></button>
<button><a href="add_ksiazka.php">Odśwież</a></button>

<?php
// form
      if (isset($_POST['nazwa'])) {
        $sql_q = "insert into ksiazka values(null, " . "'" .$_POST['nazwa'] . "'," . $_POST['autor'] . ")" ;
        if ($con->query($sql_q) === TRUE) {
            echo '<br>';
            echo "Rekord dodano pomyślnie";
          } else {
            echo '<br>';
            echo "Błąd zapytania: " . $sql_q . "<br>" . $con->error;
          }
      }
// ---
    
    ?>
</body>
</html>
</body>
</html>