var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "Ilfoggia1",
  database: "mydb"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
  var sql = "INSERT INTO customers (name, address) VALUES ('Company Inc', 'Highway 37')";
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("1 record inserted");
  });
  var sql1 = "INSERT INTO customers (name, address) VALUES ('Talentfor', 'Via Milano 37')";
  con.query(sql1, function (err, result) {
    if (err) throw err;
    console.log("1 record inserted");
  });
  var sql2 = "INSERT INTO customers (name, address) VALUES ('Selefor', 'Via Roma 37')";
  con.query(sql2, function (err, result) {
    if (err) throw err;
    console.log("1 record inserted");
  });
});
