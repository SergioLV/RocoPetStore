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
                                <h1>Agregar Producto Manual</h1>
                            </div>

                        </div>
                        <form action="success.php" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputMarca">Marca</label>
                                    <input type="text" class="form-control" id="inputMarca" name="marca" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputNombre">Nombre</label>
                                    <input type="text" class="form-control" id="inputNombre" name="name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputDesc">Descripción</label>
                                <input type="text" class="form-control" id="inputDesc" name="desc" required>
                            </div>
                            <div class="form-group">
                                <label for="inputPrecio">Precio</label>
                                <input type="text" class="form-control" id="inputPrecio" name="precio" required>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputUrlName">Nombre Imagen Url</label>
                                    <input type="text" class="form-control" id="inputUrlName" name="urlname"
                                        placeholder="nombre.jpg" required>
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
                        <p>Collares: 5eb9fdcc2887f5d50a8f5e9c</p>
                        <p>Alimentos: 5eefc330537458ee7f4ac489</p>
                        <p>Camas: 5ef0015b424bbb25277c63a3</p>
                        <p>Vestuario: 5ef001a3230954306f5fbbb3</p>
                        <p>Entrenamiento: 5ef001af7390c24b50233ee3</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
include_once("footer.php");
?>