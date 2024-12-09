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
    <title>Usuń księgarnię</title>
</head>
<body>
    <form action="" method="POST">
    <label for="id_ks">Id ksiegarni:</label>
    <input type="number" name="id_ks" id="">

        <button type="submit">Usuń</button>
        <button type="reset">Wyczyść</button>

    </form>

    <table>
<tr>
  <th>Id księgarni</th>
  <th>Nazwa</th>
  <th>Id miasta</th>
  <th>Ulica</th>
  <th>Kod pocztowy</th>
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
<button><a href="delete_ksiegarnia.php">Odśwież</a></button>


 
<?php
// form
      if (isset($_POST['id_ks'])) {
        $sql_q = "delete from ksiegarnie where id_ksiegarni = " . $_POST['id_ks'] ;
    
        
        if ($con->query($sql_q) === TRUE) {
            echo '<br>';
            echo "Rekord usunięto pomyślnie";
          } else {
            echo '<br>';
            echo "Błąd: ". $con->error;
          }
      }
// ---
    
    ?>
</body>
</html>