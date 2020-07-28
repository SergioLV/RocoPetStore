<?php
header('Content-type: text/javascript');

$prod = $_GET['key'];

require '../../vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);

$producto=$client->roco->productos->findOne(['_id' => new MongoDB\BSON\ObjectId($prod)]);

echo json_encode($producto, JSON_PRETTY_PRINT);

?>