// creare una classe song



class song{
    constructor(posizione,titolo, cantante, anno) {
    this.posizione = posizione;
    this.titolo = titolo;
    this.cantante = cantante;
    this.anno = anno;
    
    }
    
    stampa(){
        return "posizione :"+ this.posizione + " titolo " + this.titolo + " cantante: " + this.cantante + " anno: " + this.anno;
    }
}
// creare una classe hitparade che ha nel costruttore un array di canzoni
class hitparade{
   // viene inizializzato un array vuoto
    constructor(){
         this.canzoni = [];
    }
    // metodo per aggiungere una canzone all'array
    addSong(song) {
        this.canzoni.push(song);
    }
    // stampiamo il contenuto dell'array
    showlist() {
        for (var i = 0; i < this.canzoni.length; i++){
            console.log(this.canzoni[i].stampa())
        }}
        
    changeList(posizione, song) {
        
        var canzone = song;
        for (var i = 0; i < this.canzoni.length; i++){
            if (this.canzoni[i].posizione == posizione) {
                this.canzoni[i] = song;
            }
        }
        
    } 
    }
 // creiamo una variabile globale hitparade
 
 var h1 = new hitparade();

function ottieniDati(){
    
    var pos = document.forms['form']['pos'].value;
    var tit = document.forms['form']['tit'].value;
    var can = document.forms['form']['aut'].value;
    var anno = document.forms['form']['anno'].value;
    var c1 = new song(pos, tit, can, anno );
    h1.addSong(c1);
    alert("canzone inserita correttamente");
    
    
    
}

// stampa la lista con i dati presenti

function stampaDati() {
// Otteniamo l'elemento div
var outputDiv = document.getElementById("result");

// Costruiamo una stringa con il contenuto dell'array
var outputString = "<ul>";
for (var i = 0; i < h1.canzoni.length; i++) {
    outputString += "<li>" + h1.canzoni[i].stampa() + "</li>";
}
outputString += "</ul>";

// Inseriamo la stringa nel contenuto dell'elemento div
outputDiv.innerHTML = outputString;

}
