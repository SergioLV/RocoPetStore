<?php
require 'vendor/autoload.php';

function findAllProducts(){
$client=new MongoDB\Client("mongodb://localhost");
$db = $client->roco;
$productos = $db->productos;
$result = $productos->find();
return $result;
}

?>