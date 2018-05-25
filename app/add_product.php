<?php 
session_start();
include 'connection.php';
$errores = "";
$correcto = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['name'] != "" && $_POST['description'] != "" && $_POST['price'] != "" && $_POST['category'] != "0") {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $price = floatval(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING));
        $category = intval($_POST['category']);

        $sql = "SELECT * FROM inventory WHERE name = :name";
        $sentence = $connection->prepare($sql);
        $sentence->bindValue(':name', $name);
        $sentence->execute();

        // var_dump($_POST);
        // Si el producto no esta en la base de datos
        if ($sentence->fetchObject() == false) {
            $sql = "INSERT INTO inventory (name, description, price, category) 
                    VALUES (:name, :description, :price, :category)";
            $sentence = $connection->prepare($sql);
            $sentence->bindValue(':name', $name);
            $sentence->bindValue(':description', $description);
            $sentence->bindValue(':price', $price);
            $sentence->bindValue(':category', $category);
            $resultado = $sentence->execute();

            if ($resultado == false) {
                $errores = "No se pudo agregar a la base de datos";
            }
            else {
                $correcto = "Producto agregado";
            }
        }
        else {
            $errores = "El producto ya existe";
        }
    }
    else {
        $errores = "Por favor rellena todos los campos";
    }
}

// var_dump($_POST);
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
        <?php if ($errores != "") { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error: </strong><?=$errores?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } else if ($correcto != "") { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?=$correcto?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
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
                        <label for="name"><h5 class="mt-3 mt-lg-0 mt-md-0 ">Nombre del producto</h5></label>
                        <input required type="input" class="form-control rounded-0" id="name" name="name" placeholder="Ingresa el nombre del producto">
                    </div>
                    <div class="form-group">
                        <label for="description"><h5>Descripción del producto</h5></label>
                        <textarea required class="form-control rounded-0" id="description" name="description" rows="3" placeholder="Agrega una descripción breve"></textarea>
                    </div>  
                    <div class="form-group">
                        <label for="price"><h5>Precio</h5></label>
                        <input required type="input" class="form-control rounded-0" id="price" name="price" placeholder="100.00">
                    </div>
                    <div class="form-group">
                        <label for="category"><h5>Categoría</h5></label>
                        <select required class="form-control rounded-0" id="category" name="category">
                          <option value="0">Elige una categoría</option>
                          <option value="1">Papel origami</option>
                          <option value="2">Papel bond</option>
                          <option value="3">Papel grueso</option>
                          <option value="4">Papel de un color</option>
                          <option value="5">Papel de dos colores</option>
                        </select>
                    </div>
                    <div class="my-3 text-right">
                        <button type="submit" class="btn color-tema text-light rounded-0 my-sm-0 px-5">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php include 'footer.php' ?>
</body>
</html>