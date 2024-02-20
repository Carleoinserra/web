<?php
class dipendente {
    // Properties
    public $name;
    public $mansione;
    public $anni;

    function __construct($name, $mansione, $anni) {
        $this->name = $name;
        $this->mansione = $mansione;
        $this->anni = $anni; 
    }
          
    // Method to print details
    function stampa() {
        return "Nome: " . $this->name . " Mansione: " . $this->mansione . " Anni: " . $this->anni;
    }
}

if (isset($_GET["name"], $_GET["man"], $_GET["age"])) {
    $nome = $_GET["name"];
    $mans = $_GET["man"];
    $age = $_GET["age"];

    // Creazione oggetto dipendente
    $d2 = new dipendente($nome, $mans, $age);
    

    // Connessione al database e inserimento dei dati
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

        // Verifica se i dati sono già stati inseriti
        $stmt = $db->query("SELECT COUNT(*) FROM dipendenti WHERE nome = '$nome'");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row['COUNT(*)'] == 0) {
            // Query di inserimento preparata
            $stmt = $db->prepare("INSERT INTO dipendenti (nome, mansione, anni) VALUES (:nome, :mansione, :anni)");
            // Esecuzione della query di inserimento
            $stmt->execute(array(
                ':nome' => $nome,
                ':mansione' => $mans,
                ':anni' => $age
            ));
            echo "Dipendente inserito con successo!";
        } else {
            
        }

    } catch (PDOException $e) {
        echo "Errore durante l'inserimento del dipendente: " . $e->getMessage();
    }
}

// Recupero e stampa dei dipendenti
try {
    $db = new PDO('sqlite:database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dips = $db->query("SELECT * FROM dipendenti");

    // Stampa dei dipendenti
    foreach ($dips as $row) {
        echo $row['id'] . " " .$row['nome'] . " " . $row['mansione'] . " " . $row['anni'] . "<br>";
    }

} catch (PDOException $e) {
    echo "Errore durante il recupero dei dipendenti: " . $e->getMessage();
}
?>
