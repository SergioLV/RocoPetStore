<?php
session_start();



if($_SESSION['tipo-usuario'] != "comprador"){
  header("Location: /xd.php");
}


include_once("header.php");
include_once("findCateg.php");


require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);


//if(isset($_GET['remover'])){
  //  $r = $_GET['remover'];
    //unset($_SESSION['carrito'][$r]);
//}
$total=0;
?>

<div class="shopping-cart">
    <div class="px-4 px-lg-0">

        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col text-right">
                                    <a class="btn btn-secondary add-button my-3" href="tienda.php"> Seguir comprando</a>
                                </div>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Producto</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Precio</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Cantidad</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Quitar</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                      foreach ($_SESSION['carrito'] as $prod => $cantidad) {
                                          $producto=$client->roco->productos->findOne(['_id' => new MongoDB\BSON\ObjectId($prod)]);
                                    ?>

                                    <tr>
                                        <th scope="row">
                                            <div class="p-2">
                                                <img src="<?php echo $producto['url']?>" alt="" width="70"
                                                    class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <a
                                                            href="productos.php?key=<?php echo $producto['_id']?>"
                                                            class="text-dark d-inline-block"><?php echo $producto['name']?></a>
                                                    </h5>
                                                    <span
                                                        class="text-muted font-weight-normal font-italic"><?php echo $categorias[$producto['categorias']]?></span>
                                                </div>
                                            </div>
                                        <td class="align-middle"><strong><?php echo $producto['precio'] ?></strong></td>
                                        <td class="align-middle"><strong><?php echo $cantidad?></strong></td>
                                        <!--<td class="align-middle"><a href="carrito.php?remover=<?php //echo $prod; ?>" class="text-dark"><i class="fa fa-trash"></i></a>-->
                                        <td class="align-middle"><a href="/api/delcarro/?remover=<?php echo $prod; ?>"
                                                class="text-dark"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <?php
                                          $total += (int)str_replace(".","",substr($producto['precio'],1))*$cantidad;
                                          }
                                     ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- End -->
                    </div>
                </div>
                <!-- antes era pagar.php -->
                <form action="/api/compracarro/" method="POST">
                    <div class="row py-5 p-4 bg-white rounded shadow-sm">
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Código cupón
                            </div>
                            <div class="p-4">
                                <p class="font-italic mb-4">Ingresa tu código a continuación</p>
                                <div class="input-group mb-4 border rounded-pill p-2">
                                    <input type="text" placeholder="BWRT-ASDT-VFAD-WQER"
                                        aria-describedby="button-addon3" class="form-control border-0">
                                    <div class="input-group-append border-0">
                                        <button id="button-addon3" type="button"
                                            class="btn btn-dark px-4 rounded-pill"><i
                                                class="fa fa-gift mr-2"></i>Aplicar descuento</button>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Instrucciones
                                al repartidor</div>
                            <div class="p-4">
                                <p class="font-italic mb-4">Si tienes información para el despacho, por favor
                                    coméntanos.</p>


                                <textarea name="comentario" cols="30" rows="2" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Resumen Pedido
                            </div>
                            <div class="p-4">
                                <p class="font-italic mb-4">Despacho y costos adicionales serán calculados en aquí.</p>
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                            class="text-muted">Subtotal Pedido
                                        </strong><strong><?php echo "$",str_replace(",",".",number_format($total));?></strong>
                                    </li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                            class="text-muted">Despacho
                                            (5%)</strong><strong><?php echo "$",str_replace(",",".",number_format($total*0.05));?></strong>
                                    </li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                            class="text-muted">Total</strong>
                                        <h5 class="font-weight-bold">
                                            <?php echo "$",str_replace(",",".",number_format($total*1.05));?></h5>
                                    </li>
                                </ul>

                                <input type="hidden" name="total" value="<?php echo $total*1.05;?>" />
                                <input type="submit" class="btn btn-dark rounded-pill py-2 btn-block"
                                    value="Enviar Pedido" />
                </form>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</div>
<?php
include_once("footer.php");
?>