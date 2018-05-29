<?php 
$errores = "";
session_start();
include 'connection.php';

if (count($_SESSION) == 0) {
    header("Location: index.php");
    return;
}

$sql = "SELECT id_product, name, price, quantity, image FROM inventory";
$result = $connection->query($sql);
$i = 0;
if ($result != false) {
    $data = $result->fetchAll(PDO::FETCH_NAMED);
}
else {
    die("Error en la consulta");
}

var_dump($data[0]['image']);
unset($_SESSION['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Eliminar producto
    if (isset($_POST['b1'])) {
        $_SESSION['id'] = $_POST['b1'];
        header("Location: delete_product.php");
    }
    
    // Modifciar producto
    if (isset($_POST['b2'])) {
        $_SESSION['id'] = $_POST['b2'];
        header("Location: edit_product.php");
    }
    
    // Agregar cantidad
    if (isset($_POST['b3'])) {
        $_SESSION['id'] = $_POST['b3'];
        $_SESSION['opt'] = "i";
        header("Location: product_transaction.php");
    }
    
    // Quitar cantidad
    if (isset($_POST['b4'])) {
        $_SESSION['id'] = $_POST['b4'];
        $_SESSION['opt'] = "e";
        header("Location: product_transaction.php");
    }

}

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
        <!-- Muestra mensajes de error y correcto -->
        <?php if ($errores != "") { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error: </strong><?=$errores?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } else if (isset($_SESSION['correcto']) && $_SESSION['correcto'] != "") { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?=$_SESSION['correcto']?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?=$_SESSION['correcto'] = ""?>
        </div>
        <?php } ?>

        <div class="row">
<?php include 'navigation.php' ?>
            <div class="col-md-10 mt-5 mt-lg-0 col">
                <!-- Hacer que se imprima toda la tabla -->
                <?php if (count($data) > 0) { ?>
                <?php foreach ($data as $key) { ?>
                <form method="POST" action="">                
                <div class="row mb-4" id="botones">
                    <div class="col-2">
                        <a href="#"><img src="inventory_images/<?=$data[$i]['image']?>" class="img-fluid"></a>
                    </div>
                    <div class="col-lg-5  col-9 order-1">
                        <strong>Nombre: </strong><span id="dname"><?=$data[$i]['name']?></span><br>
                        <strong>Precio: </strong><span id="dprice"><?=$data[$i]['price']?></span><br>
                        <strong>Cantidad: </strong><span id="dquantity"><?=$data[$i]['quantity']?></span><br>
                        <a class="badge badge-info" href="view_product.php?id=<?=$data[$i]['id_product']?>">Ver más...</a>
                    </div>
                    <div class="col-lg-2 col order-2" id="b1">
                        <!-- Eliminar -->
                        <button type="submit" class="my-2 btn btn-danger" name="b1" value="<?=$data[$i]['id_product']?>" title="Eliminar"><i class="fas fa-trash-alt"></i></button><span class=""> Eliminar</span><br>


                        <!-- Modificar -->
                        <button type="submit" class="btn btn-dark" name="b2" value="<?=$data[$i]['id_product']?>" title="Modificar"><i class="fas fa-pencil-alt"></i></button> <span>Editar</span>
                    </div>
                    <div class="col-lg-3 col order-2">
                        <!-- Agregar cantidad -->
                        <button type="submit" class="my-2 btn btn-secondary" name="b3" value="<?=$data[$i]['id_product']?>" title="Salida de producto"><i class="fas fas fa-plus"></i></button><span> Agregar</span><br>
                        <!-- Quitar cantidad -->
                        <button type="submit" class="btn btn-secondary" name="b4" value="<?=$data[$i++]['id_product']?>" title="Entrada de producto"><i class="fas fa-minus"></i></button> <span>Quitar</span>
                    </div>
                </div>
                </form>
                <hr>

                <?php } ?>
                <?php } else { ?>
                    <!-- Si no hay productos en el inventario -->
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        No hay productos en el inventario
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
<script src="script.js"></script>
<?php include 'footer.php' ?>
</body>
</html>