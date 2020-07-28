<?php

session_start();
if(empty($_POST)){
    header("Location: /xd.php");
}
print_r($_SESSION);
if($_POST['total'] == 0){
    unset($_POST);
    //Arreglarlo y hacerlo con javascript. Que no deje ir al action si el carrito está vacío.
    header("Location: /carrito.php");
}else{
    require '../../vendor/autoload.php';
    $uri="mongodb://localhost";
    $client=new MongoDB\Client($uri);
    $total = $_POST['total'];
    $usuario= $client->roco->usuarios->find();
    $ordenes = $client->roco->ordenes;
    $ordenes_count = $client->roco->ordenes->count();

    foreach($usuario as $entry){
        if($entry['usuario'] == $_SESSION['usuario']){

            $ordenes->insertOne(array('usuario' => $_SESSION['usuario'],
                                      'total' => $total, 
                                      'productos' => $_SESSION['carrito'],
                                      'nro_venta' => ($ordenes_count+1),
                                      'comentario' => $_POST['comentario'],
                                      'nombre_cliente' => $entry['nombre'],
                                      'apellido_cliente' => $entry['apellido'],
                                      'pais_cliente' => $entry['pais'],
                                      'region_cliente' => $entry['region'],
                                      'comuna_cliente' => $entry['comuna'],
                                      'direccion_cliente' => $entry['direccion'],
                                      'telefono_cliente' => $entry['telefono'],));

        }
    }
    
    unset($_SESSION['carrito']);
    header("Location: /pagar.php");
}



?>