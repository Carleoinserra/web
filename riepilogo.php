<?php
try {
    // Connessione a SQLite usando PDO
    $db = new PDO('sqlite:database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query per recuperare tutti gli ordini
    $stmt = $db->query("SELECT * FROM ordiniAccettati");
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
  foreach($orders as $order) {
    echo(" pizza: ". $order['pizza'] . " contorno: ". $order['contorno']. " bibita: " . $order['bibita'] . " costo: " . $order['costo']);
    echo("<hr>");
  }
}
 catch (PDOException $e) {
    echo "Errore durante il recupero degli ordini: " . $e->getMessage();
}

?>
