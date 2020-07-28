<?php
session_start();
if($_SESSION['tipo-usuario'] == 'vendedor'){
  header("Location: /index.php");
}
include_once("header.php");
include_once("findCateg.php");
include_once("findProd.php");

$productos = findAllProducts();

//Usa un botón dependiendo si hay o no sesión iniciada.
if(isset($_SESSION['usuario'])){
  $href = "agregar.php";
}else{
  $href = "login.php";
}

?>

<section class="tienda-bg">

      <div class="container pt-3">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb bg-light">
            <li class="breadcrumb-item" aria-current="page"><a class="text-dark" href="index.php">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tienda</li>
          </ol>
       </nav>

        <div class="row">
          <aside class="col-md-3">
            <div class="card">
              <article class="filter-group">
                <header class="card-header cat-card">
                  <a href="tienda.php" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true">
                    <h6 class="pt-2 title text-dark"> <i class="fa fa-paw"></i> Categorías</h6>
                  </a>
                </header>
                <div class="filter-content collapse show" id="collapse_1">
                  <div class="card-body">
                    <ul class="list-unstyled">
                      <li class="mb-3">
                        <a
                          class="text-dark"
                          href="tienda.php"
                          >
                           Todos los productos</a
                        >
                      </li>

                      <?php

                foreach($categorias as $key =>$cat){ 
                  
                  ?>


                <li>
                <a class="text-dark" href="tiendalist.php?key=<?php echo $key?>"><?php echo $cat?></a>
                </li>

                <?php
                }
                ?>
                    </ul>
                  </div>
                </div>
              </article>
            </div>
          </aside>
         
          <main class="col-md-9">
            <div class="row bg-light">
            
             <?php
        foreach( $productos as $key =>
              $value){ 
                  ?>
              <div class="col-md-4 pb-3">
                <figure class="card card-product-grid h-100">
                  <div class="inner">
                    <a href="productos.php?key=<?php echo $value['_id']?>">
                    <img class="card-img-top img-fluid" style="" src="<?php echo $value['url']?>"/>
                    </a>
                  </div>
         

                  <figcaption class="info-wrap text-center pt-3">
                  <p class="marca"><?php echo $value['marca']?></p>
                    <div class="fix-height tieda-product-name ">
                      
                      <a class="tieda-product-name-href"href="productos.php?key=<?php echo $value['_id']?>" ><?php echo $value['name']?></a>
                      <div class="price-wrap mt-2 tieda-product-name-href">
                        <span><?php echo $value['precio']?></span>
                      </div>
            
                    </div>
                    <form action="<?php echo $href?>" method="POST">
                    <input type="hidden" name="producto" value="<?php echo $value['_id']?>"/>
                    <input type="hidden" name="cantidad" value="1"/>
                    <input class="btn btn-secondary add-button my-3" type="submit" value="Agregar al carrito"/>
                  </form>
                  </figcaption>
                </figure>
              </div>
    
              <?php
}
?>
            </div>
           
          </main>
      
        </div>
      </div>
 
    </section>
<?php
include_once("footer.php")
?>