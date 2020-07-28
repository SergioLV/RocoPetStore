<?php
include_once("header.php");
include_once("findCateg");
$prod = $_GET['key'];

//Usa un botón dependiendo si hay o no sesión iniciada.
if(isset($_SESSION['usuario'])){
    //$href = "agregar.php";
    $href = "/api/agregarcarro/";
  }else{
    $href = "login.php";
  }


require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);


$producto=$client->roco->productos->findOne(['_id' => new MongoDB\BSON\ObjectId($prod)]);

foreach ($collection as $entry) {
   $prods[$entry['_id']->__toString() ] = $entry['name'];
}

$marca = $producto['marca'];
$img = $producto['url'];  
$price = $producto['precio'];
$price_num = str_replace(",",".",number_format($price));
$nombre = $producto['name'];
$desc = $producto['desc'];


?>

<section id="product-display">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light  mt-n4">
            <li class="breadcrumb-item" aria-current="page"><a class="text-dark" href="index.php">Inicio</a></li>
            <li class="breadcrumb-item" aria-current="page"><a class="text-dark" href="tienda.php">Tienda</a></li>
            <li class="breadcrumb-item" aria-current="page"><a class="text-dark"
                    href="tiendalist.php?key=<?php echo $producto['categorias']?>"><?php echo $categorias[$producto['categorias']]?></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $nombre?></li>
        </ol>
    </nav>
    <div class="row no-gutters" id="main-product-display">
        <div class="col-lg-6 offset-lg-0 text-center align-items-lg-end pt-5">
            <img class="img-fluid" data-aos="fade-up" src="<?php echo $img?>"></div>
        <div class="col offset-1 d-flex flex-column" data-aos="fade-up">
            <div class="row">

                <div class="col" style="padding-top: 20px;">
                    <p class="marca-producto"><?php echo $marca?></p>
                    <h1><strong><?php echo $nombre?></strong></h1>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <h6>Precio Efectivo</h6>
                    <p class="precio"><?php echo $price?>&nbsp; $<span
                            style="text-decoration: line-through;"><?php echo str_replace(",",".",number_format((int)str_replace(".","",substr($price,1))+5000))?></span>
                    </p>
                    <h3>Descripción</h1>
                        <p class="desc text-justify"><?php echo $desc?></p>
                        <h3 class="mb-3">Cantidad</h1>
                </div>
            </div>
            <form action="<?php echo $href?>" method="POST">
                <input type="hidden" name="producto" value="<?php echo $prod?>" />
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <input id="cantidad" class="border rounded border-secondary form-control form-control-lg"
                            type="number" name="cantidad" value="1" min="0" max="10" />
                    </div>
                    <div class="form-group col-md-3 mt-2">
                        <input class="btn btn-secondary add-button" type="submit" value="Agregar al carrito" />
                    </div>
            </form>
        </div>
    </div>
</section>

<?php
include_once("footer.php")
?>