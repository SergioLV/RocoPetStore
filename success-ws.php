<?php
session_start();
if($_SESSION['tipo-usuario'] != "vendedor"){
    header("Location: /xd.php");
  }
if(empty($_POST)){
    header("Location: /addprod.php");
}
include_once("header.php");
// url antigua '/assets/img/'.strtolower($categorias[$_POST['categorias']]).'/'.$_POST['urlname']

// Declaracion de variables del scrapping al sitio pyk.cl.
include_once("simple_html_dom.php");
$html = file_get_html($_POST['url_prod_pyk']);
$marca = ucwords(strtolower($html->find('h3[class=product-vendor]',0)->plaintext));
$name = $html->find('h2[class=product-title]',0)->plaintext;
$desc = $html->find('div[class=product-description]',0)->plaintext; 
$precio = $html->find('h4[class=product-price]',0)->plaintext;
$precio = str_replace(" ","",$precio); 
$img = $html->find('img[class=responsive]',0)->src;

require 'vendor/autoload.php';
$uri="mongodb://localhost";
$client=new MongoDB\Client($uri);
$productos = $client->roco->productos;



$productos->insertOne(array('name' => $name,
                            'desc' => $desc, 
                            'marca' => $marca,
                            'url' => $img, 
                            'categorias' => $_POST['categorias'],
                            'precio' => $precio));

?>
 <div class="Sucess">
    <div class="px-4 px-lg-0 bg-light">
        <div class="pb-5 pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                    <h1 class="text-center">Producto agregado!</h1>
                    <p class="text-center pt-3"><a class="text-dark" href="addprodws.php">Seguir agregando: Web Scrapping</a></p>
                    <p class="text-center"><a class="text-dark" href="addprod.php">Seguir agregando: Manual</a></p>
                </div>
            </div>
         </div>
    </div>
</div> 

<?php
include_once("footer.php");
?>
