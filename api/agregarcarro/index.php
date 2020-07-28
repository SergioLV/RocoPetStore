<?php
session_start();
//echo json_decode(false);

if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito'] = Array();
}

if(isset($_SESSION['carrito'][$_POST['producto']])){
    $_SESSION['carrito'][$_POST['producto']]+= $_POST['cantidad'];
    

}else{
    $_SESSION['carrito'][$_POST['producto']] = $_POST['cantidad'];
}
header("Location: /carrito.php");
//echo json_encode(true);


?>
