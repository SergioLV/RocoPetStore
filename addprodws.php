<?php
session_start();

if($_SESSION['tipo-usuario'] != "vendedor"){
    header("Location: /xd.php");
}
include_once("header.php");
?>


<div class="shopping-cart">
    <div class="px-4 px-lg-0 bg-light">
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5 mt-5">
                        <div class="row">
                            <div class="col text-center pb-3">
                                <h1>Web Scrapping Pyk.cl</h1>
                            </div>

                        </div>
                        <form action="success-ws.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputurl_prod_pyk">Url del Producto</label>
                                    <input type="text" class="form-control" id="inputurl_prod_pyk" name="url_prod_pyk"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCat">Categoría</label>
                                    <select id="inputCat" class="form-control" name="categorias" required>
                                        <option selected>Seleccione...</option>

                                        <?php
                                         foreach($categorias as $key =>$cat){ 
                                        ?>

                                        <option><?php echo $key?></option>

                                        <?php
                                         }
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col text-center">
                                    <input class="btn btn-secondary add-button my-3" type="submit"
                                        value="Agregar producto a la base de datos" />
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shopping-cart">
    <div class="px-4 px-lg-0 bg-light">
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                        <h1>Id categorías</h1>
                        <p>Platos: 5ef00145d89ebd4c9a51f2d3 </p>
                        <p>Juguetes: 5ef0019387465f7ceb734e64</p>
                        <p>Collares: 5ef0015193a3e36d3f6f7652</p>
                        <p>Alimentos: 5eefc330537458ee7f4ac489</p>
                        <p>Camas: 5ef0015b424bbb25277c63a3</p>
                        <p>Vestuario: 5ef001a3230954306f5fbbb3</p>
                        <p>Entrenamiento: 5ef001af7390c24b50233ee3</p>
                        <p>Excursión: 5ef6fa670aa83449f67106e4</p>
                        <p>Medicamentos: 5efcba21cdb9d00b752dcdb3</p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php
include_once("footer.php");
?>