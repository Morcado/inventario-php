<?php 
session_start();
include 'connection.php';
$errores = "";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Boostrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Mis estilos -->
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Lista de productos</title>
</head>
<body>
<?php include 'navbar.php' ?>
    <div class="container pt-md-5 mt-md-5 pt-sm-5 mt-sm-5">
        <div class="row">
<?php include 'navigation.php' ?>
            <div class="col-md-5">
                <label for="name"><h5 class="mt-3 mt-lg-0 mt-md-0">Nombre del producto</h5></label>
                <input type="input" class="form-control rounded-0" id="name" name="name" placeholder="Ingresa el nombre del producto" value="<?=$result->name?>">
                <div class="form-group">
                    <label for="description"><h5>Descripción del producto</h5></label>
                    <textarea class="form-control rounded-0" id="description" name="description" rows="3" placeholder="Agrega una descripción breve"><?=$result->description?></textarea>
                </div>
                <div class="form-group">
                    <label for="price"><h5>Precio</h5></label>
                    <input type="input" class="form-control rounded-0" id="price" name="price" placeholder="300" value="<?=$result->price?>">
                </div>
                <div class="form-group">
                    <label for="product_category"><h5>Categoría</h5></label>
                    <select class="form-control rounded-0" id="product_category" name="product_category">
                        <option value="1" selected="">Papel</option>
                        <option value="2">aaaa</option>
                        <option value="3">neuva pocion</option>
                        <option value="4">popo</option>
                        <option value="5">caakaa</option>
                    </select>
                </div>
                <div class="my-3 text-right">
                    <button class="btn btn-outline-success rounded-0 my-sm-0 px-5">Guardar</button>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php' ?>
</body>
</html>