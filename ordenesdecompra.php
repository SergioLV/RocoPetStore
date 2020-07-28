<?php
session_start();

if($_SESSION['tipo-usuario'] != "vendedor"){
    header("Location: /xd.php");
}

require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$ordenes = $client->roco->ordenes->find();
$productos = $client->roco->ordenes->find();
include_once("header.php");
include_once("findCateg.php");
?>
<?php
  foreach($ordenes as $entry){
?>
<div class="shopping-cart">
    <div class="px-4 px-lg-0 bg-light">
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5 mt-5">
                        <h3 class="pl-4">Nro. venta: <?php echo $entry['nro_venta']?></h3>
                        <div class="table-responsive mt-3">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Productos</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Cantidad</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Precio</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                      foreach($entry['productos'] as $id_prod => $cant){
                                          $producto=$client->roco->productos->findOne(['_id' => new MongoDB\BSON\ObjectId($id_prod)]);
                                      ?>

                                    <tr>
                                        <th scope="row" class="border-0">
                                            <div class="p-2">
                                                <img src="<?php echo $producto['url']?> " alt="" width="70"
                                                    class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <p></p>
                                                    <h5 class="mb-0"> <a href="#"
                                                            class="text-dark d-inline-block align-middle"><?php echo $producto['name']?></a>
                                                    </h5>
                                                    <span
                                                        class="text-muted font-weight-normal font-italic d-block"><?php echo $categorias[$producto['categorias']]?></span>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="border-0 align-middle"><strong><?php echo $cant?></strong></td>
                                        <td class="border-0 align-middle">
                                            <strong><?php echo $producto['precio']?></strong></td>

                                        <?php
                                        }
                                          ?>
                                </tbody>
                            </table>

                            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                                <div class="col-lg-6">
                                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Datos
                                        Cliente</div>
                                    <div class="p-4">
                                        <ul class="list-unstyled mb-4">
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Nombre</strong><strong><?php echo $entry['nombre_cliente'];?></strong>
                                            </li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Apellido</strong><strong><?php echo $entry['apellido_cliente'];?></strong>
                                            </li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Pais</strong><strong><?php echo $entry['pais_cliente'];?></strong>
                                            </li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Región</strong><strong><?php echo $entry['region_cliente'];?></strong>
                                            </li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Comuna</strong><strong><?php echo $entry['comuna_cliente'];?></strong>
                                            </li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Dirección</strong><strong><?php echo $entry['direccion_cliente'];?></strong>
                                            </li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Teléfono</strong><strong><?php echo $entry['telefono_cliente'];?></strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Resumen
                                        Pedido </div>
                                    <div class="p-4">
                                        <ul class="list-unstyled mb-4">
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Subtotal Pedido
                                                </strong><strong><?php echo "$",str_replace(",",".",number_format($entry['total']));?></strong>
                                            </li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Despacho
                                                    (5%)</strong><strong><?php echo "$",str_replace(",",".",number_format($entry['total']*0.05));?></strong>
                                            </li>
                                            <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                                    class="text-muted">Total</strong>
                                                <h5 class="font-weight-bold">
                                                    <?php echo "$",str_replace(",",".",number_format($entry['total']*1.05));?>
                                                </h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">
                                            Instrucciones al repartidor</div>
                                        <div class="p-4">
                                            <p><?php echo $entry['comentario']?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
}
?>
<?php
include_once("footerempleados.php");
?>