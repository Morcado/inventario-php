<?php 
$errores = "";
session_start();
include 'connection.php';

if (count($_SESSION) == 0) {
    header("Location: index.php");
    return;
}

$sql = "SELECT id_provider, name, phone, address, email FROM providers";
$result = $connection->query($sql);
$i = 0;
if ($result != false) {
    $data = $result->fetchAll(PDO::FETCH_NAMED);
}
else {
    die("Error en la consulta");
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Eliminar producto
    if (isset($_POST['b1'])) {
        $_SESSION['id'] = $_POST['b1'];
        $_SESSION['pr'] = '1';
        header("Location: delete_product.php");
    }
    
    // Modifciar producto
    if (isset($_POST['b2'])) {
        $_SESSION['id'] = $_POST['b2'];
        header("Location: edit_provider.php");
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
    <title>Lista de proveedores</title>
</head>
<body>
<?php include 'navbar.php' ?>
    <div class="container pt-md-5 mt-md-5 pt-sm-5 mt-sm-5">
        <!-- Muestra mensajes de error y correcto -->
        <?php if (isset($_SESSION['errores']) && $_SESSION['errores'] != "") { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error: </strong><?=$errores?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?=$_SESSION['errores'] = ""?>
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
                        <div class=" col-sm-auto col-lg-6  order-1">
                            <strong>Nombre: </strong><span id="dname"><?=$data[$i]['name']?></span><br>
                            <strong>Telefono: </strong><span id="dphone"><?=$data[$i]['phone']?></span><br>
                            <strong>Dirección: </strong><span id="daddress"><?=$data[$i]['address']?></span><br>
                            <strong>Correo electrónico: </strong><span id="demail"><?=$data[$i]['email']?></span><br>
                            
                        </div>
                        <div class="col order-2" id="b1">
                            <!-- Eliminar -->
                            <button type="submit" class="my-2 btn btn-danger btnGetId" name="b1" value="<?=$data[$i]['id_provider']?>" data-toggle="modal" data-target="#confirmation" title="Eliminar"><i class="fas fa-trash-alt"></i></button> Eliminar


                            <!-- Modificar -->
                            <button type="submit" class="btn btn-warning" name="b2" value="<?=$data[$i]['id_provider']?>" title="Modificar"><i class="fas fa-pencil-alt"></i></i></button> Modificar
                        </div>
                    </div>
                    </form>
                    <hr>
                    <?php $i++ ?>
                    <?php } ?>
                <?php } else { ?>
                    <!-- Si no hay productos en el inventario -->
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        No hay proveedores
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>

<?php include 'footer.php' ?>
</body>
</html>