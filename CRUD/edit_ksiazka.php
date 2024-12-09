
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
    <title>Edytuj książkę</title>
</head>
<body>
    <form action="" method="POST">
    <label for="id_k">Id książki:</label>    
    <input type="number" name="id_k" id="">
        <label for="nazwa">Tytuł</label>    
        <input type="text" name="nazwa" id="">
        <label for="autor">Id autora:</label>
        <input type="number" name="autor" id="">

        <button type="submit">Edytuj</button>
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
<button><a href="edit_ksiazka.php">Odśwież</a></button>

<?php
// form
      if (isset($_POST['nazwa'])) {
        $sql_q1 = "update ksiazka set tytul =" . "'" . $_POST['nazwa']. "' where id_ksiazki = " . $_POST['id_k'] ;
        $sql_q2 = "update ksiazka set id_autora =" . "'" . $_POST['autor']. "' where id_ksiazki = " . $_POST['id_k'] ;
        
        if ($con->query($sql_q1) === TRUE && $con->query($sql_q2) === TRUE) {
            echo '<br>';
            echo "Rekord edytowano pomyślnie";
          } else {
            echo '<br>';
            echo "Błąd: ". $con->error;
          }
      }
// ---
    
    ?>
</body>
</html>
</body>
</html>