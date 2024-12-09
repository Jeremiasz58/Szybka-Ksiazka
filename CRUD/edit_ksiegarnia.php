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
    <title>Edytuj księgarnię</title>
</head>
<body>
    <form action="" method="POST">
    <label for="id_ks">Id ksiegarni:</label>
    <input type="number" name="id_ks" id="">
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

        <button type="submit">Edytuj</button>
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
        <td>" . $rekord['kod_pocztowy'] . "</td>
        <td>" . $rekord['mapa'] . "</td>";
        echo "</tr>";
      } 

// ---
?>

</table>
<button><a href="index.php">Powrót</a></button>
<button><a href="edit_ksiegarnia.php">Odśwież</a></button>


 
<?php
// form
      if (isset($_POST['nazwa'])) {
        $sql_q1 = "update ksiegarnie set nazwa =" . "'" . $_POST['nazwa']. "' where id_ksiegarni = " . $_POST['id_ks'] ;
        $sql_q2 = "update ksiegarnie set id_miasta =" . "'" . $_POST['woj']. "' where id_ksiegarni = " . $_POST['id_ks'] ;
        $sql_q3 = "update ksiegarnie set ulica =" . "'" . $_POST['ulica']. "' where id_ksiegarni = " . $_POST['id_ks'] ;
        $sql_q4 = "update ksiegarnie set kod_pocztowy =" . "'" . $_POST['kod_p']. "' where id_ksiegarni = " . $_POST['id_ks'] ;
        $sql_q5 = "update ksiegarnie set mapa =" . "'" . $_POST['map']. "' where id_ksiegarni = " . $_POST['id_ks'] ;
        
        if ($con->query($sql_q1) === TRUE && $con->query($sql_q2) === TRUE && $con->query($sql_q3) === TRUE && $con->query($sql_q4) === TRUE&& $con->query($sql_q5) === TRUE) {
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