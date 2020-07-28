<?php
session_start();

if(isset($_GET['remover'])){
    $r = $_GET['remover'];
    unset($_SESSION['carrito'][$r]);
}

header("Location: /carrito.php")

?>