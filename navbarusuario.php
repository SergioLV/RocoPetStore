<nav class="navbar navbar-light navbar-expand-md text-right"
    style="background-color: rgb(0, 0, 0); height: 20px; font-size: 10px;">
    <div class="container">
        <a class="navbar-brand" style="color: rgb(255, 255, 255); font-size: 8px;"><i
                class="fa fa-envelope-o"></i>contacto@roco.cl&nbsp; &nbsp;<i class="fa fa-phone"></i>+569 48738273</a>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" href="https://www.facebook.com/cheeeeecho"><i class="fa fa-facebook"
                            style="color: rgb(255, 255, 255);"></i></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="https://www.instagram.com/cheeeeecho"><i class="fa fa-instagram"
                            style="color: rgb(255, 255, 255);"></i></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><i class="fa fa-twitter"
                            style="color: rgb(255, 255, 255);"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<section id="logo"></section>
<nav class="navbar navbar-light navbar-expand-md navigation-clean">
    <div class="container">
        <a class="navbar-brand" href="index.php" style="color: rgb(8, 8, 8); font-size: 30px;">Roco</a><button
            data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1">
            <span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="tienda.php">Tienda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false"
                        href="#">Productos&nbsp;</a>
                    <div class="dropdown-menu" role="menu">
                        <?php
                          foreach($categorias as $key =>$cat){ 
                           ?>

                        <a class="dropdown-item" role="presentation"
                            href="tiendalist.php?key=<?php echo $key?>"><?php echo $cat?></a>
                        <?php
                        }
                        ?>

                <li class="nav-item dropdown">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i
                            class="fa fa-user-circle-o"></i> <?php echo $_SESSION['usuario']?>&nbsp;</a>
                    <div class="dropdown-menu" role="menu">
                        <a href="perfil.php" class="dropdown-item">Perfil</a>
                        <a href="historial.php" class="dropdown-item">Historial de compras</a>

                        <form action="unlog.php" method="POST">
                            <input class="dropdown-item" type="submit" name="total" value="Cerrar Sesión" />
                        </form>
                    </div>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" href="carrito.php"><i class="fa fa-shopping-cart"></i> Carro de compras</a>
                </li>
        </div>
        </li>
        </ul>
    </div>
    </div>
</nav>