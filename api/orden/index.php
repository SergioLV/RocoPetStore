<?php
header('Content-type: text/javascript');

$orden_key = $_GET['key'];

require '../../vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$orden = $client->roco->ordenes->findOne(['_id' => new MongoDB\BSON\ObjectId($orden_key)]);

echo json_encode($orden,JSON_PRETTY_PRINT);

?>