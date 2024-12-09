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

    <table>
<tr>
<th>Id miasta</th>
  <th>Nazwa</th>
  <th>Id województwa</th>
</tr>

<?php
// Rekordy:
      $sql_table_q = "select * from miasta" ;
      $miasta = $con->query($sql_table_q);
      while($rekord = $miasta->fetch_assoc()){
        echo "<tr>";
        echo "
        <td>" . $rekord['id_miasta'] . "</td>
        <td>" . $rekord['nazwa'] . "</td>
        <td>" . $rekord['id_woj'] . "</td>";
        echo "</tr>";
      } 

// ---
?>

</table>
<button><a href="index.php">Powrót</a></button>
<button><a href="add_miasto.php">Odśwież</a></button>



<?php
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