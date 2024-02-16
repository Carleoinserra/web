const http = require('http');
const fs = require('fs');
const path = require('path');
const mysql = require('mysql');

// Configurazione della connessione al database MySQL
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'Ilfoggia1',
    database: 'mydb'
});

// Connessione al database
connection.connect((error) => {
    if (error) {
        console.error('Errore durante la connessione al database:', error);
        return;
    }
    console.log('Connessione al database avvenuta con successo');
});

// Creazione del server HTTP
const server = http.createServer((req, res) => {
    if (req.method === 'GET' && req.url === '/') {
        // Se la richiesta è per la root, leggi il file HTML e invialo come risposta
        fs.readFile(path.join(__dirname, 'page.html'), (error, content) => {
            if (error) {
                res.writeHead(500, {'Content-Type': 'text/plain'});
                res.end('Errore interno del server');
            } else {
                res.writeHead(200, {'Content-Type': 'text/html'});
                res.end(content, 'utf-8');
            }
        });
    } else if (req.method === 'POST' && req.url === '/submit') {
        // Se la richiesta è una POST per la pagina di invio dei dati
        let body = '';
        req.on('data', chunk => {
            body += chunk.toString();
        });
        req.on('end', () => {
            const formData = new URLSearchParams(body);
            const nome = formData.get('nome');
            const addr = formData.get('addr');
            // Esegui l'insert nel database
            connection.query('INSERT INTO customers (name, address) VALUES (?, ?)', [nome, addr], (error, results) => {
                if (error) {
                    console.error('Errore durante l\'inserimento dei dati nel database:', error);
                    res.writeHead(500, {'Content-Type': 'text/plain'});
                    res.end('Errore durante l\'inserimento dei dati nel database');
                } else {
                    res.writeHead(200, {'Content-Type': 'text/plain'});
                    res.end('Dati inseriti correttamente nel database');
                }
            });
        });
    }
else if ((req.method === 'POST' && req.url === '/mostra')){
    const connection1 = mysql.createConnection({
        host: 'localhost',
        user: 'root',
        password: 'Ilfoggia1',
        database: 'mydb'
    });
    connection1.connect(function(err) {
        if (err) throw err;
        connection1.query("SELECT * FROM customers", function (err, result, fields) {
          if (err) throw err;

          // Supponendo che 'results' sia un array di risultati
// Costruire una stringa HTML che rappresenta una lista
let htmlList = '<ul>';
for (let i = 0; i < result.length; i++) {
    const row = result[i];
    htmlList += `<li>${row.name} - ${row.address}</li>`;
}
htmlList += '</ul>';

// Invia la lista HTML come risposta al client
res.writeHead(200, {'Content-Type': 'text/html'});
res.end(htmlList);
                    
      });});
     


}


     else {
        // Altrimenti, gestisci altre richieste (ad esempio, per CSS, JavaScript, ecc.)
        // Puoi aggiungere la logica per servire altri file statici qui
    }
});

// Avvio del server
server.listen(3000, () => {
    console.log('Server in ascolto sulla porta 3000');
});
