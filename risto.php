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

$o1 = new ordine("Margherita", "patatine", "coca", 5, 3, 2);
echo $o1 -> stampa();
echo $o1 -> stampaTotale();


?>
