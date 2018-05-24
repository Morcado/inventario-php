        <div class="col-md-2 mb-4 mb-lg-0">
            <?php if (isset($_SESSION['username'])){ ?>
            <div class="list-group collapse navbar-collapse d-none d-md-block">
                <a href="add_product.php" class="btn btn-success rounded-0 mb-4 px-2 py-2 list-group-item list-group-item-action">Agregar Producto</a>
                <a href="modify-product.php" class="btn btn-success rounded-0 mb-4 px-2 py-2 list-group-item list-group-item-action">Modificar Productos</a>
                <a href="#" class="btn btn-success rounded-0 mb-4 px-2 py-2 list-group-item list-group-item-action">Eliminar productos</a>
                <a href="product-list.php" class="btn btn-success rounded-0 mb-4 px-2 py-2 list-group-item list-group-item-action">Lista de productos</a>
                <?php if ($_SESSION['username'] == 'admin'): ?>
                <a href="report.php" class="btn btn-success rounded-0 mb-4 px-2 py-2 list-group-item list-group-item-action">Reporte de ventas</a>
                <?php endif ?>
            </div>
            <?php } ?>
        </div>
