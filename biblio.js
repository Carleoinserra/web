class libro {
    
    constructor (autore, titolo, anno){
        this.autore = autore;
        this.titolo = titolo;
        this.anno = anno;
    }
    
    stampa(){
        return "autore: "+ this.autore + " titolo: "+ this.titolo + "anno: "+ this.anno;
    }
}

class biblioteca {
     
    constructor(){
       this.biblio = [];
    }
    addLibro(libro){
        this.biblio.push(libro);
    }
    cercalibroDaAutore(autore) {
        var listaAutore = [];
        for (var i = 0; i < this.biblio.length; i++) {
            if (this.biblio[i].autore == autore) {
                listaAutore.push(this.biblio[i])
            }
            
        }
        return listaAutore;
    }
      cercalibroDaAnno(anno) {
        var listaAnno = [];
        for (var i = 0; i < this.biblio.length; i++) {
            if (this.biblio[i].anno == anno) {
                listaAnno.push(this.biblio[i])
            }
            
        }
        return listaAnno;
    }
}

var l1 = new libro("Dante", "Divina Commedia", 1300);
var l2 = new libro("Dante", "Poesie", 1300);
var l3 = new libro("Stephen King", "It", 1990);
var l4 = new libro("Stephen King", "Misery non deve morire", 1998);
var l5 = new libro("Umberto Eco", "Nel nome della rosa", 1994);
var l6 = new libro("Jack Kerouac", "On the road", 1968);
var b1 = new biblioteca();
b1.addLibro(l1);
b1.addLibro(l2);
b1.addLibro(l3);
b1.addLibro(l4);
b1.addLibro(l5);
b1.addLibro(l6);
function mostraLibri(){
    var outputDiv = document.getElementById("result");

// Costruiamo una stringa con il contenuto dell'array
var outputString = "<ul>";
for (var i = 0; i < b1.biblio.length; i++) {
    outputString += "<li>" + b1.biblio[i].stampa() + "</li>";
}
outputString += "</ul>";

// Inseriamo la stringa nel contenuto dell'elemento div
outputDiv.innerHTML = outputString;
}

function ricercaAutore(){
    var outputDiv = document.getElementById("result1");
    var aut = document.forms['form']['autore'].value;
    var listaAutore = b1.cercalibroDaAutore(aut);
    var outputString = "<ul>";
for (var i = 0; i < listaAutore.length; i++) {
    
    outputString += "<li>" + listaAutore[i].stampa() + "</li>";
}
outputString += "</ul>";
// Inseriamo la stringa nel contenuto dell'elemento div
outputDiv.innerHTML = outputString;
}
