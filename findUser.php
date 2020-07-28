<?php
require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);

$collection=$client->roco->usuarios;
$colleccategorias=($collection->find());
$usuariosfind=array();

foreach ($colleccategorias as $entry) {
    $usuariosfind[$entry['_id']->__toString() ] = $entry['name'];
}
?>