<?php

$result = ($_GET['decision']);
var_dump($result);
echo "<hr>";
echo $result["2"];
 
echo "<hr>";


echo"<hr>";

foreach ($result as $x) {
  $temp = (explode(".",$x));
  echo "$temp[0] <br>";
  echo "$temp[1] <br>";
  if ($temp[1] == "n"); {
    try {
    // Connessione a SQLite usando PDO
    $db = new PDO('sqlite:database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $db->prepare("DELETE FROM ordini WHERE id = :order_id");
$stmt->bindParam(':order_id', $temp[0]);
$stmt->execute();
   

}
  catch (PDOException $e) {
    echo "Errore durante il recupero degli ordini: " . $e->getMessage();
}
  }
}
