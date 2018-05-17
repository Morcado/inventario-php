<?php 
session_start();
include 'header.php'; 
?>

            <!-- Columna central -->
            <div class="col-md-5 mt-5 mt-lg-0">
                <a href="#"><img src="holder.js/500x500" class="img-fluid"></a>
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Elegir Imagen</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </form>
            </div>

            <!-- Columna derecha -->
            <div class="col-md-5">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nombre"><h5 class="mt-3 mt-lg-0 mt-md-0 ">Nombre del producto</h5></label>
                        <input type="input" class="form-control rounded-0" id="product_name" name="product_name" placeholder="Ingresa el nombre del producto">
                    </div>
                    <div class="form-group">
                        <label for="descripcion"><h5>Descripción del producto</h5></label>
                        <textarea class="form-control rounded-0" id="product_description" name="product_description" rows="3" placeholder="Agrega una descripción breve"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_quantity"><h5>Cantidad</h5></label>
                        <input type="input" class="form-control rounded-0" id="product_quantity" name="product_quantity" placeholder="10-100">
                    </div>
                    <div class="form-group">
                        <label for="product_price"><h5>Precio</h5></label>
                        <input type="input" class="form-control rounded-0" id="product_price" name="product_price" placeholder="300">
                    </div>
                    <div class="form-group">
                        <label for="product_date_ingress"><h5>Fecha</h5></label>
                        <input type="input" class="form-control rounded-0" id="product_date_ingress" name="product_date_ingress" placeholder="12/12/12">
                    </div>
                    <div class="form-group">
                        <label for="product_category"><h5>Categoría</h5></label>
                        <select class="form-control rounded-0" id="product_category">
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                    </div>
                    <div class="my-3 text-right">
                        <button type="submit" class="btn btn-outline-success rounded-0 my-sm-0 px-5">Guardar</button>
                    </div>
                </form>
            </div>

<?php include 'footer.php'; ?>
