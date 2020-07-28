<?php

header('Content-type: text/javascript');


require '../../vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$categorias = $client->roco->categorias->find();


foreach($categorias as $entry){
    echo json_encode($entry, JSON_PRETTY_PRINT);
}

header("Access-Control-Allow-Origin: *");
?>