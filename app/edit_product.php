<?php 
session_start();
include 'connection.php';
$errores = "";
$correcto = "";

if (count($_SESSION) == 0) {
    header("Location: index.php");
    return;
}

$sql = "SELECT name FROM providers";
$respuesta = $connection->query($sql);
if ($respuesta != null) {
    $data = $respuesta->fetchAll(PDO::FETCH_NUM);
}

if (isset($_SESSION['id'])) {
    $id_product = intval($_SESSION['id']);
    $sql = "SELECT * FROM inventory WHERE id_product = :id_product";
    $sentence = $connection->prepare($sql);
    $sentence->bindValue(':id_product', $id_product);
    $sentence->execute();
    $result = $sentence->fetchObject();
    if ($result == false) {
        $errores = "ID no existe";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['id'])) {

        
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $provider = filter_input(INPUT_POST, 'provider', FILTER_SANITIZE_STRING);
        var_dump($provider);
        $id = $_SESSION['id'];

        $sql ="UPDATE inventory SET name = :name, description = :description, price = :price, provider = :provider
                WHERE id_product = $id";
        $sentence = $connection->prepare($sql);

        $sentence->bindValue(':name', $name);
        $sentence->bindValue(':provider', $provider);
        $sentence->bindValue(':description', $description);
        $sentence->bindValue(':price', $price);
        $sentence->execute();

        $_SESSION['correcto'] = "Producto modificado correctamente";
        header("Location: product_list.php");
    }
    else {
        $errores = "Error al modificar: ID no definido";
    }
}   

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
    
    <title>Lista de productos</title>
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

        <form method="POST" action="">
        <div class="row">
<?php include 'navigation.php' ?>
        <?php if (isset($id_product)): ?>
            <div class="col-md-5 mt-5 mt-lg-0">
                <a href="#"><img src="inventory_images/<?=$result->image?>" class="img-fluid"></a>

            </div>
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
                    <label for="provider"><h5>Provider</h5></label>
                    <select class="form-control rounded-0" id="provider" name="provider">
                        <?php if (count($data) > 0){ ?>
                          <option value="-1">Elige un proveedor</option>
                            <?php for ($i=0; $i < count($data); $i++) { ?>
                                <option value="<?=$data[$i][0]?>"><?=$data[$i][0]?></option>
                            <?php } ?>
                            
                        <?php } else { ?>
                            <option disabled selected>No hay proveedores. Por favor agregar un proveedor</option>
                        <?php } ?>
                    </select>
                </div>
                <div class="my-3 text-right">
                    <a href="product_list.php" class="btn btn-secondary my-sm-0 mb-3">Cancelar</a>
                    <button class="btn btn-success color-tema my-sm-0 mb-3">Guardar</button>
                </div>
            </div>
        <?php endif ?>
        </div>
        </form>
    </div>

<?php include'footer.php' ?>
</body>
</html>