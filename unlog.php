<?php
session_start();
unset($_SESSION['usuario']);
unset($_SESSION['tipo-usuario']);
header("Location: /index.php");

?>