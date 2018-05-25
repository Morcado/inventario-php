        <div class="col-md-2 mb-4 mb-lg-0">
            <?php if (isset($_SESSION['username'])){ ?>
            <div class=" list-group collapse navbar-collapse d-none d-md-block">
                <a href="add_product.php" class="btn mb-4 px-2 text-light color-tema btn-block">
                Agregar Producto</a>
                <a href="product_list.php" class="btn mb-4 px-2 text-light color-tema btn-block active">Lista de productos</a>
                <a href="add_provider.php" class="btn mb-4 px-2 text-light color-tema btn-block ">Agregar proveedor</a>
                <a href="provider_list.php" class="btn mb-4 px-2 text-light color-tema btn-block ">Lista de proveedores</a>
                <?php if ($_SESSION['username'] == 'admin'): ?>
                <a href="report.php" class="btn rounded-0 mb-4 px-2 text-light color-tema btn-block ">Reporte de inventario</a>
                <?php endif ?>
            </div>
            <?php } ?>
        </div>
