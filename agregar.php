<?php
session_start();

if(!isset($_SESSION['carrito'])){
    $_SESSION['carrito'] = Array();
}

if(isset($_SESSION['carrito'][$_POST['producto']])){
    $_SESSION['carrito'][$_POST['producto']]+= $_POST['cantidad'];
    

}else{
    $_SESSION['carrito'][$_POST['producto']] = $_POST['cantidad'];
}

header("Location: /carrito.php");
?>