<?php
session_start();
if($_SESSION['tipo-usuario'] != "vendedor"){
    header("Location: /xd.php");
  }
if(empty($_POST)){
    header("Location: /addprod.php");
}
include_once("header.php");

require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$productos = $client->roco->productos;

//$url = '/assets/img/'.strtolower($categorias[$_POST['categorias']]).'/'.$_POST['urlname'];

$productos->insertOne(array('name' => $_POST['name'],
                            'desc' => $_POST['desc'], 
                            'marca' => $_POST['marca'],
                            'url' => '/assets/img/'.strtolower($categorias[$_POST['categorias']]).'/'.$_POST['urlname'], 
                            'categorias' => $_POST['categorias'],
                            'precio' => $_POST['precio']));

?>
<div class="Sucess">
    <div class="px-4 px-lg-0 bg-light">
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                        <h1 class="text-center">Producto agregado!</h1>
                        <p class="text-center pt-3"><a class="text-dark" href="addprodws.php">Seguir agregando: Web
                                Scrapping</a></p>
                        <p class="text-center"><a class="text-dark" href="addprod.php">Seguir agregando: Manual</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
include_once("footer.php");
?>