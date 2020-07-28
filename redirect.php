<?php
session_start();
require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$usuario_insert = $client->roco->usuarios;
$_SESSION['update'] = TRUE;
$updateusuario = $usuario_insert->updateOne(
    ['usuario' => $_SESSION['usuario']],
    ['$set' => ["nombre" => $_POST['nombre'],
        "apellido" => $_POST['apellido'],
        "pais" => $_POST['pais'],
        "region" => $_POST['region'],
        "comuna" => $_POST['comuna'],
        "direccion" => $_POST['direccion'],
        "telefono" => $_POST['telefono']
    ]
    ]

);

header("Location: /perfil.php");

?>

