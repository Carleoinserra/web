<?php 
   $user = $_GET['nuovo_username_utente'];
   $pass = $_GET['nuova_password_utente'];

  if ($user != "" && $pass != "") {
try {
  
  $db = new PDO('sqlite:database.sqlite');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $res = $db->exec(
    "CREATE TABLE IF NOT EXISTS utenti (
      id INTEGER PRIMARY KEY AUTOINCREMENT, 
      username TEXT, 
      password TEXT 
      
    )"
  );

   $db = new PDO('sqlite:database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
  
  
  // Query di inserimento preparata
    $stmt = $db->prepare("INSERT INTO utenti (username, password) VALUES (:user, :pass)");

  // Esecuzione della query di inserimento
    $stmt->execute(array(
        ':user' => $user,
        ':pass' => $pass
    ));
 echo("utente registrato con successo");

 

 } 
   
 
  catch (PDOException $e) {
        echo "Errore durante l'inserimento del prodotoo: " . $e->getMessage();
    }}
else echo("dati mancanti");


?>
