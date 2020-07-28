var express = require("express");
var app = express();

var MongoClient = require("mongodb").MongoClient;
var url = "mongodb://localhost:27017/";

var dbo, Categorias, Catproductos, Productos;

MongoClient.connect(url, function (err, db) {
  if (err) throw err;
  dbo = db.db("roco");
  Categorias = dbo.collection("categorias");
  Productos = dbo.collection("productos");
});

app.get("/categorias", function (req, res) {
  Categorias.find({}).toArray(function (err, result) {
    if (err) throw err;
    var arr = {};
    for (var i in result) arr[result[i]["_id"]] = result[i]["name"];
    res.send(arr);
  });
});

app.get("/productos", function (req, res) {
  Productos.find({}).toArray(function (err, result) {
    if (err) throw err;
    var arr = {};
    for (var i in result) arr[result[i]["_id"]] = result[i]["name"];
    res.send(result);
  });
});

app.get("/productos/:prods", function (req, res) {
  dbo.collection("productos", function (err, collection) {
    var BSON = require("mongodb").BSONPure;
    var obj_id = new require("mongodb").ObjectID(req.params.prods);
    collection.findOne({ _id: obj_id }, function (err, doc) {
      if (doc) {
        res.send(doc);
      } else {
        console.log("xd");
      }
    });
  });
});

app.listen(3000, function () {
  console.log("Example app listening on port 3000!");
});
