<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity=" sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Mis estilos -->
    <link rel="stylesheet" type="text/css" href="estilos.css">
    
    <!-- Iconos -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    
    <title>Agrega producto</title>
</head>
<body>
<?php include 'navbar.php' ?>
    <div class="container pt-md-5 mt-md-5 pt-sm-5 mt-sm-5">
        <div class="row">
<?php include 'navigation.php' ?>

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
        </div>
    </div>
<?php include 'footer.php' ?>
</body>
</html>