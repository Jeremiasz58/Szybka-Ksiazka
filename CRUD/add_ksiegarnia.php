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
    <title>Dodaj księgarnię</title>
</head>
<body>
    <form action="" method="POST">
        <label for="nazwa">Nazwa</label>    
        <input type="text" name="nazwa" id="">
        <label for="woj">Id miasta:</label>
        <input type="number" name="woj" id="">
        <label for="ulica">Ulica</label>    
        <input type="text" name="ulica" id="">
        <label for="kod_p">Kod pocztowy</label>    
        <input type="text" name="kod_p" id="">
        <label for="map">Adres map Google</label>    
        <input type="text" name="map" id="">

        <button type="submit">Dodaj</button>
        <button type="reset">Wyczyść</button>

    </form>

    <table>
<tr>
  <th>Id księgarni</th>
  <th>Nazwa</th>
  <th>Id miasta</th>
  <th>Ulica</th>
  <th>Kod pocztowy</th>
  <th>Adres map Google</th>
</tr>

<?php
// Rekordy:
      $sql_table_q = "select * from ksiegarnie" ;
      $ksieg = $con->query($sql_table_q);
      while($rekord = $ksieg->fetch_assoc()){
        echo "<tr>";
        echo "
        <td>" . $rekord['id_ksiegarni'] . "</td>
        <td>" . $rekord['nazwa'] . "</td>
        <td>" . $rekord['id_miasta'] . "</td>
        <td>" . $rekord['ulica'] . "</td>
        <td>" . $rekord['kod_pocztowy'] . "</td>";
        echo "</tr>";
      } 

// ---
?>

</table>
<button><a href="index.php">Powrót</a></button>
<button><a href="add_ksiegarnia.php">Odśwież</a></button>


 
<?php
      if (isset($_POST['nazwa'])) {
        $sql_q = "insert into ksiegarnie values(null, " . "'" .$_POST['nazwa'] . "'," . $_POST['woj'] . ", '". $_POST['ulica'] . "', '" .$_POST['kod_p'] . "')" ;
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