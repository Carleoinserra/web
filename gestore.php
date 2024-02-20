<?php
try {
    // Connessione a SQLite usando PDO
    $db = new PDO('sqlite:database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query per recuperare tutti gli ordini
    $stmt = $db->query("SELECT * FROM ordini");
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verifica se ci sono ordini
    if ($orders) {
        echo "<h2>Ordini</h2>";

        // Form per confermare/rifiutare gli ordini
        echo "<form action='process_orders.php' method='POST'>";

        // Ciclo attraverso gli ordini e crea i radio button per ciascuno
        foreach ($orders as $order) {
            echo "<h3>Dettagli ordine ID: " . $order['id'] . "</h3>";
            echo "<p>Pizza: " . $order['pizza'] . "</p>";
            echo "<p>Contorno: " . $order['contorno'] . "</p>";
            echo "<p>Bibita: " . $order['bibita'] . "</p>";

            // Crea i radio button per confermare/rifiutare l'ordine
            echo "<input type='radio' name='decision[" . $order['id'] . "]' value='Conferma'> Conferma";
            echo "<input type='radio' name='decision[" . $order['id'] . "]' value='Rifiuta'> Rifiuta";
            echo "<br>";
        }

        // Invia il modulo
        echo "<input type='submit' value='Invia decisioni'>";
        echo "</form>";
    } else {
        echo "Nessun ordine trovato.";
    }

} catch (PDOException $e) {
    echo "Errore durante il recupero degli ordini: " . $e->getMessage();
}
?>
