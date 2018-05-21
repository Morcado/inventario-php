

    <div class="collapse navbar-collapse justify-content-end " id="navbarNavAltMarkup">
        <!-- Cuadro de búsqueda -->
        <div class="row">
            <form class=" form-inline my-2 my-lg-0 ">
                <div class="col-8">
                    <input class="form-control mr-sm-2 rounded-0" type="search" placeholder="Buscar" aria-label="Search">
                </div>
                <div class="col">
                    <button class="btn btn-outline-success my-2 my-sm-0 rounded-0" type="submit">Buscar</button>
                </div>
            </form>

            <div class="col">
                <p class="navbar-text text-light">
                    <?php if (isset($_SESSION)): ?>
                        
                        <?=$_SESSION['username']?>
                    <?php endif ?>
                </p>
            </div>
            <div class="col">
                <a class="nav-link text-light" href="close.php">Salir</a>
            </div>
            <div class="col">
                <a href=""><i class="fas fa-user text-light m-2"></i></a>
            </div>
        </div>  
    </div>
    <!-- Imagen y login -->
</nav>

<div class="container pt-md-5 mt-md-5 pt-sm-5 mt-sm-5">
    <div class="row">
        <div class="col-md-2 mb-4 mb-lg-0">
            <div class="list-group collapse navbar-collapse d-none d-md-block">
                <a href="add_product.php" class="btn btn-success rounded-0 mb-4 px-2 py-2 list-group-item list-group-item-action">Agregar Producto</a>
                <a href="modify-product.php" class="btn btn-success rounded-0 mb-4 px-2 py-2 list-group-item list-group-item-action">Modificar Productos</a>
                <a href="#" class="btn btn-success rounded-0 mb-4 px-2 py-2 list-group-item list-group-item-action">Eliminar productos</a>
                <a href="product-list.php" class="btn btn-success rounded-0 mb-4 px-2 py-2 list-group-item list-group-item-action">Lista de productos</a>
                <?php if (isset($_SESSION) && $_SESSION['username'] == 'admin'): ?>
                    <button type="button" class="btn btn-success rounded-0 mb-4 px-2 py-2 list-group-item list-group-item-action">Reporte de ventas</button>
                    
                <?php endif ?>
            </div>
        </div>