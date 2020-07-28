<?php
header('Content-type: text/javascript');

$cat = $_GET['key'];

require '../../vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);

$productos=$client->roco->productos->find();

foreach ($productos as $entry){
    if($entry['categorias'] == $cat){
        echo json_encode($entry, JSON_PRETTY_PRINT);
    }
} 
?>