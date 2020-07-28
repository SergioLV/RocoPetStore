<?php

header('Content-type: text/javascript');


require '../../vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$ordenes = $client->roco->ordenes->find();


foreach($ordenes as $entry){
    echo json_encode($entry, JSON_PRETTY_PRINT);
}
?>