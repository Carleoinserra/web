<?php
class ordine {
    // Properties
    public $pizza;
    public $contorno;
    public $bibita;
    public $prePizza;
    public $preContorno;
    public $preBibita;

    function __construct($pizza, $contorno, $bibita, $prePizza, $preContorno, $preBibita) {
        $this -> pizza = $pizza;
        $this->contorno = $contorno;
        $this->bibita = $bibita; 
      $this -> prePizza = $prePizza;
        $this->preContorno = $preContorno;
        $this->preBibita = $preBibita; 
    }
          
    // Method to print details
    function stampa() {
        return "Pizza : " . $this->pizza . " Contorno : " . $this->contorno . " Bibita: " . $this->bibita;
    }
    function stampaTotale(){
      $somma = $this -> prePizza + $this-> preContorno + $this-> preBibita;

      return $somma;
    }
}



 $piz = $_GET["pizza"];
  $con = $_GET["contorno"];
$bib = $_GET["bibita"];


$el1 = explode(".",$piz);

$el2 = explode(".",$con);

$el3 = explode(".",$bib);

$o1 = new ordine($el1[0], $el2[0], $el3[0], $el1[1], $el2[1], $el3[1]);

echo $o1 -> stampa();
echo $o1 -> stampaTotale();

try {
  $db = new PDO('sqlite:database.sqlite');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $res = $db->exec(
    "CREATE TABLE IF NOT EXISTS ordini (
      id INTEGER PRIMARY KEY AUTOINCREMENT, 
      pizza TEXT, 
      contorno TEXT, 
      bibita TEXT,
      costo INTEGER
    )"
  );
$piz1 = $o1 -> pizza;
  
    $con1 = $o1 -> contorno;
    $bib1 = $o1 -> bibita;
  $costo = $o1 -> stampaTotale();

  // Query di inserimento preparata
    $stmt = $db->prepare("INSERT INTO ordini (pizza, contorno, bibita, costo) VALUES (:pizza, :contorno, :bibita, :costo)");

  // Esecuzione della query di inserimento
    $stmt->execute(array(
        ':pizza' => $piz1,
        ':contorno' => $con1,
        ':bibita' => $bib1,
      ':costo' => $costo
    ));}

  catch (PDOException $e) {
        echo "Errore durante l'inserimento del prodotoo: " . $e->getMessage();
    }





?>
