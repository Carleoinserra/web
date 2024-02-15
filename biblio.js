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

    for (var i = 0; i < b1.biblio.length; i++){
   console.log(b1.biblio[i].stampa());
    }
    
    var stringa = prompt("cerca libro da autore: ");
    var lista = b1.cercalibroDaAutore(stringa);
    for (var i = 0; i < lista.length; i++){
        console.log(lista[i]); }
    
    
    var stringa1 = prompt("cerca libro da anno: ");
    var lista1 = b1.cercalibroDaAnno(stringa1);
    for (var i = 0; i < lista1.length; i++){
        console.log(lista1[i]); }

