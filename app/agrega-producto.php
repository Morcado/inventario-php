<?php include 'encabezado.php'; ?>

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
    <form>
        <div class="form-group">
            <label for="nombre"><h5 class="mt-3 mt-lg-0 mt-md-0 ">Nombre del producto</h5></label>
            <input type="input" class="form-control rounded-0" id="nombre" placeholder="Ingresa el nombre del producto">
        </div>
        <div class="form-group">
            <label for="descripcion"><h5>Descripción del producto</h5></label>
            <textarea class="form-control rounded-0" id="descripcion" rows="3" placeholder="Agrega una descripción breve"></textarea>
        </div>
        <div class="form-group">
            <label for="cantidad"><h5>Cantidad</h5></label>
            <input type="input" class="form-control rounded-0" id="cantidad" placeholder="10-100">
        </div>
        <div class="form-group">
            <label for="precio"><h5>Precio</h5></label>
            <input type="input" class="form-control rounded-0" id="precio" placeholder="300">
        </div>
        <div class="form-group">
            <label for="fecha"><h5>Fecha</h5></label>
            <input type="input" class="form-control rounded-0" id="fecha" placeholder="12/12/12">
        </div>
        <div class="form-group">
            <label for="categoria"><h5>Categoría</h5></label>
            <select class="form-control rounded-0" id="categoria">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
        </div>
        <div class="my-3 text-right">
            <button class="btn btn-outline-success rounded-0 my-sm-0 px-5">Guardar</button>
        </div>
    </form>
</div>

<?php include 'pie.php'; ?>
