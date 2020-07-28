<?php
include_once("findCateg.php");
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Roco's Pet Store!</title>
    <link rel="icon" href="/assets/img/iconoblanco.ico" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css" />
    <link rel="stylesheet" href="assets/css/best-carousel-slide.css" />
    <link rel="stylesheet" href="assets/css/Features-Clean.css" />
    <link rel="stylesheet" href="assets/css/Footer-Dark.css" />
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css" />
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery.css" />
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/Team-Clean.css" />
    <link rel="stylesheet" href="assets/css/Article-Clean.css" />
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
</head>

<body>
    <?php



  if(isset($_SESSION['usuario']) and $_SESSION['tipo-usuario'] == "comprador"){
    include_once("navbarusuario.php");
  }else if (isset($_SESSION['usuario']) and $_SESSION['tipo-usuario'] == "vendedor"){
    include_once("navbarvendedor.php"); 
    
  }else{
    include_once("navbarexterno.php");
  }
    ?>