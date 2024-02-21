<?php

$result = ($_GET['decision']);
var_dump($result);
echo "<hr>";

 



echo"<hr>";

foreach ($result as $x) {
  $temp = (explode(".",$x));
  echo "$temp[0] <br>";
  echo "$temp[1] <br>";
  if ($temp[1] == "n") {
    try {
    // Connessione a SQLite usando PDO
    $db = new PDO('sqlite:database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $db->prepare("DELETE FROM ordini WHERE id = :order_id");
$stmt->bindParam(':order_id', $temp[0]);
$stmt->execute();
echo("ordine rifiutato e cancellato");
      echo("<br>");
   

}
  catch (PDOException $e) {
    echo "Errore durante il recupero degli ordini: " . $e->getMessage();
}
  }



  
  else if ($temp[1] == "y") {
 try {
  $db = new PDO('sqlite:database.sqlite');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $res = $db->exec(
    "CREATE TABLE IF NOT EXISTS ordiniAccettati (
      id INTEGER PRIMARY KEY AUTOINCREMENT, 
      pizza TEXT, 
      contorno TEXT, 
      bibita TEXT,
      costo INTEGER
    )"
  );

   $db = new PDO('sqlite:database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query per recuperare tutti gli ordini
    $stmt = $db->prepare("SELECT * FROM ordini WHERE id = :order_id");
$stmt->bindParam(':order_id', $temp[0]);
$stmt->execute();
echo("ordine accetato");
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
   var_dump($orders);

   foreach ($orders as $order)
   
 $piz1 = $order['pizza'];
  
    $con1 = $order['contorno'];
    $bib1 = $order['bibita'];
  $costo = $order['costo'];

  // Query di inserimento preparata
    $stmt = $db->prepare("INSERT INTO ordiniAccettati (pizza, contorno, bibita, costo) VALUES (:pizza, :contorno, :bibita, :costo)");

  // Esecuzione della query di inserimento
    $stmt->execute(array(
        ':pizza' => $piz1,
        ':contorno' => $con1,
        ':bibita' => $bib1,
      ':costo' => $costo
    ));
 echo("prodotto accettato con successo");

 $db = new PDO('sqlite:database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   $stmt = $db->prepare("DELETE FROM ordini WHERE id = :order_id");
$stmt->bindParam(':order_id', $temp[0]);
$stmt->execute();

      echo("<br>");

 } 
   
 
  catch (PDOException $e) {
        echo "Errore durante l'inserimento del prodotoo: " . $e->getMessage();
    }
}
}



 


?>
