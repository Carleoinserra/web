<?php 

try {
  $db = new PDO('sqlite:database.sqlite');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $res = $db->exec(
    "CREATE TABLE IF NOT EXISTS dipendenti (
      id INTEGER PRIMARY KEY AUTOINCREMENT, 
      nome TEXT, 
      mansione TEXT, 
      anni INTEGER
    )"
  );
$nome = "Mario Rossi";
    $mansione = "Sviluppatore";
    $anni = 30;

    // Query di inserimento preparata
    $stmt = $db->prepare("INSERT INTO dipendenti (nome, mansione, anni) VALUES (:nome, :mansione, :anni)");

    // Esecuzione della query di inserimento
    $stmt->execute(array(
        ':nome' => $nome,
        ':mansione' => $mansione,
        ':anni' => $anni
    ));

    echo "Dipendente inserito con successo!";
} catch (PDOException $e) {
    echo "Errore durante l'inserimento del dipendente: " . $e->getMessage();
}

  
  
  
  // Bind values directly to statement variables
  
  
  $dips = $db->query("SELECT * FROM dipendenti");
    
  // Garbage collect db
 

?>

<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?= '<h1>Messages</h1>'; ?>
    
    <?php foreach ($dips as $d) { 
      echo '<p>';
        echo '<h4>' . $d['nome'] . '</h4>';
        echo $d['mansione'];  
      echo '</p>';
    } ?>
  </body>
</html>
