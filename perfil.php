<?php
session_start();
if($_SESSION['tipo-usuario'] != 'comprador'){
    header("Location: /xd.php");
}
require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$usuario_insert = $client->roco->usuarios;
$usuarios = $client->roco->usuarios->find();
$completado = "";

if($_SESSION['update']){
    $completado = "Sus datos fueron actualizados con éxito!";
    $_SESSION['update'] = FALSE;

}
include_once("header.php");

foreach($usuarios as $entry){
    if ($entry['usuario'] == $_SESSION['usuario']){

?>
<div class="shopping-cart">
    <div class="px-4 px-lg-0 bg-light">
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5 mt-5">
                        <div class="row">
                            <div class="col text-center pb-3">
                                <h1>Hola, <?php echo $_SESSION['usuario']?>. Bienvenido!</h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <p class="perfil-p">En esta sección de nuestra página podrás actualizar tus datos de
                                    envío para que tus productos lleguen donde lo necesites.</p>
                                <div class="row ">
                                    <div class="col text-center">
                                        <h1>Datos de Envío</h1>
                                        <div class="completed pb-3"> <?php echo $completado;?> <a class="completed"
                                                href="login.php"><?php echo $sesion;?></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="redirect.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputNombre">Nombre</label>
                                    <input type="text" class="form-control" id="inputNombre" name="nombre"
                                        value="<?php echo $entry['nombre']?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputApellido">Apellido</label>
                                    <input type="text" class="form-control" id="inputApellido" name="apellido"
                                        value="<?php echo $entry['apellido']?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPais">País</label>
                                    <input type="text" class="form-control" id="inputPais" name="pais"
                                        value="<?php echo $entry['pais']?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputRegion">Región</label>
                                    <input type="text" class="form-control" id="inputRegion" name="region"
                                        value="<?php echo $entry['region']?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputComuna">Comuna</label>
                                    <input type="text" class="form-control" id="inputComuna" name="comuna"
                                        value="<?php echo $entry['comuna']?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputDireccion">Direccion</label>
                                    <input type="text" class="form-control" id="inputDireccion" name="direccion"
                                        value="<?php echo $entry['direccion']?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputTelefono">Teléfono</label>
                                    <input type="text" class="form-control" id="inputTelefono" name="telefono"
                                        value="<?php echo $entry['telefono']?>">
                                </div>
                            </div>
                            <div class="form-row">
                            </div>
                            <div class="form-row">
                                <div class="col text-center">
                                    <input class="btn btn-secondary add-button my-3" type="submit"
                                        value="Actualizar mis datos" />
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
}
include_once("footer.php");
?>