<?php
session_start();
/* if(empty($_POST)){
    header("Location: /xd.php");
}
if($_POST['total'] == 0){
    unset($_POST);
    header("Location: /carrito.php");
}else{
    require 'vendor/autoload.php';
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
} */
include_once("header.php");
?>
<div id="fondo-gracias" class="article-clean">
    <div class="container">
        <div class="row">
            <div id="gracias" class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <div class="intro">
                    <h1 class="text-center texk-dark">Gracias por preferirnos!</h1>
                    <p class="text-center text-dark">Estas 3 bellezas están muy felices por haberle sido de ayuda.</p>
                    <img class="img-fluid" src="assets/img/perritos.JPG">
                </div>
                <div class="text">
                    <p class="text-center">Roco's Pet Store! agradece su compra y espera que disfrute sus productos.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once("footer.php");;
?>