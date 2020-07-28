<?php
session_start();

if(!empty($_SESSION['usuario'])){
    header("Location: /xd.php");
  }
require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$usuarios = $client->roco->usuarios->find();
$estado_contraseña = FALSE;
$estado_usuario= FALSE;
$error_contraseña = "";
$error_usuario = "";
$tipo_usuario = "";


if (!empty($_POST)){
    foreach($usuarios as $entry){
        if ($_POST['usuario'] == $entry['usuario'] and $_POST['contraseña'] == $entry['contraseña'] ){
            $estado_usuario = TRUE;
            $estado_contraseña = TRUE;
            $tipo_usuario = $entry['tipo-usuario'];

        }
        if ($_POST['usuario'] == $entry['usuario'] and $_POST['contraseña'] != $entry['contraseña'] ){
           $estado_usuario = TRUE;
           $estado_contraseña = FALSE;
        }
    }
    if ($estado_usuario == TRUE and $estado_contraseña == TRUE){
        $_SESSION['usuario'] = $_POST['usuario'];
        $_SESSION['tipo-usuario'] = $tipo_usuario;
        $_SESSION['update'] = FALSE;
        header('Location: /index.php'); 
        
    }
    if ($estado_usuario == TRUE and $estado_contraseña == FALSE){
        $error_usuario = "Contraseña incorrecta!";
    }
    if (!$estado_usuario){
        $error_usuario = "Usuario inexistente!";
    }

}
include_once("header.php");

    




?>
<div class="login-clean" style="background-color: rgb(246,247,249);">
    <form action="login.php" method="POST">
        <h1 class="text-center text-dark">Inicia Sesión</h1>
        <div class="illustration"><i class="fa fa-user login-icon"></i></div>
        <div class="alerta pb-3"> <?php echo $error_usuario;?></div>
        <div class="alerta pb-3"> <?php echo $error_contraseña;?></div>
        <div class="form-group"><input class="form-control" type="text" name="usuario" placeholder="Usuario"></div>
        <div class="form-group"><input class="form-control" type="password" name="contraseña" placeholder="Contraseña">
        </div>
        <div class="form-group text-center"><button class="btn btn-dark add-button" type="submit">Ingresar</button>
        </div><a class="forgot" href="forgot.php">Olvidaste tu contraseña?</a>
    </form>
</div>
<?php
include_once("footer.php");
?>