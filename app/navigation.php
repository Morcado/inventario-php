            
        <div class="col-md-2 mb-4 mb-lg-0 mt-5 mt-lg-0">
            <?php if (isset($_SESSION['username'])){ ?>
            <div class=" list-group " id="navv">
                <a href="add_product.php" class="btn mt-2 mb-4 px-2 text-light color-tema ">
                Agregar Producto</a>
                <a href="product_list.php" class="btn mb-4 px-2 text-light color-tema  ">Lista de productos</a>
                <a href="add_provider.php" class="btn mb-4 px-2 text-light color-tema   ">Agregar proveedor</a>
                <a href="provider_list.php" class="btn mb-4 px-2 text-light color-tema  ">Lista de proveedores</a>
                <?php if ($_SESSION['username'] == 'admin'): ?>
                <a href="report.php" class="btn  mb-4 px-2 text-light color-tema btn-block ">Reporte</a>
                <a href="edit_about.php" class="btn  mb-4 px-2 text-light color-tema">Editar información <br>de la empresa</a>
                <?php endif ?>
            </div>
            <?php } ?>
        </div>
