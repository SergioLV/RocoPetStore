<?php
if(!empty($_SESSION['usuario'])){
    header("Location: /xd.php");
  }

include_once("header.php");


require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$usuario_insert = $client->roco->usuarios;
$usuarios = $client->roco->usuarios->find();
$error = "";
$completado = "";
$sesion = "";


//Chequea si el array _POST tiene valores.
//#1 ver si el usuario existe en la bdd. ready.
//#2 ver si las contraseñas coinciden. ready.
//#3 agregar si todo está bien.
if (!empty($_POST)){
    foreach($usuarios as $entry){
        if ($_POST["usuario"] == $entry['usuario']){
            $error = "El usuario ya existe!";
        }
    }
    if($_POST["contraseña"] != $_POST["contraseña-check"]){
        $error = "Las contraseñas no coinciden!";
    }
    if ($error =="El usuario ya existe!" || $error =="Las contraseñas no coinciden!"){

    }else{
        $completado ="Cuenta registrada! <br> Ya puedes";
        $sesion = "Iniciar sesion.";
        $usuario_insert->insertOne(array('usuario' => $_POST['usuario'],
                                         'contraseña' => $_POST['contraseña'],
                                         'nombre' => "",
                                         'apellido' => "",
                                         'pais' => "",
                                         'region' => "",
                                         'comuna' => "",
                                         'direccion' => "",
                                         'telefono' => "",
                                         'tipo-usuario' => 'comprador'));
    }
}
?>

<div class="register-photo">
    <div class="form-container">
        <div class="image-holder"></div>
        <form action="registro.php" method="POST">
            <h2 class="text-center"><strong>Crea una cuenta</strong></h2>
            <div class="alerta pb-3"> <?php echo $error;?></div>
            <div class="completed pb-3"> <?php echo $completado;?> <a class="completed"
                    href="login.php"><?php echo $sesion;?></a></div>
            <div class="form-group"><input class="form-control" type="usuario" name="usuario" placeholder="Usuario"
                    required /></div>
            <div class="form-group"><input class="form-control" type="password" name="contraseña"
                    placeholder="Contraseña" required /></div>
            <div class="form-group"><input class="form-control" type="password" name="contraseña-check"
                    placeholder="Repite tu contraseña" required /></div>
            <div class="form-group">
                <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox"
                            value="1" required />Acepto los <a class="text-dark" href="terminos.php" target="blank"
                            rel="noopener noreferrer">Términos y Condiciones.</a></label></div>
            </div>
            <div class="form-group"><input class="btn btn-block btn-secondary add-button mt-3" type="submit"
                    value="Registrarse" /></button></div><a class="already" href="login.php">Ya tienes cuenta? Inicia
                sesión.</a>
        </form>
    </div>
</div>
<?php
include_once("footer.php");
?>