<?php
require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);

$collection=$client->roco->categorias;
$colleccategorias=($collection->find());
$categorias=array();

foreach ($colleccategorias as $entry) {
    $categorias[$entry['_id']->__toString() ] = $entry['name'];
}
?>