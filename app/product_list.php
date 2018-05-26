<?php 
$errores = "";
session_start();
include 'connection.php';
$sql = "SELECT id_product, name, price, quantity FROM inventory";
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
        $id_product = $_POST['b1'];
        var_dump($_POST);
        $sql = "DELETE FROM inventory WHERE id_product = :id_product";
        $sentence = $connection->prepare($sql);
        $sentence->bindValue(':id_product', $id_product);
        $sentence->execute();

        $resultado = $sentence->fetchObject();
        if ($resultado == false) {
            
        }
            
        $_SESSION['correcto'] = "Producto eliminado";
        //header("Location: product_list.php");
    }
    
    // Modifciar producto
    if (isset($_POST['b2'])) {
        $_SESSION['id'] = $_POST['b2'];
        header("Location: edit_product.php");
    }
    
    // Agregar cantidad
    if (isset($_POST['b3'])) {
        $_SESSION['id'] = $_POST['b3'];
        var_dump($_POST['b3']);
        // header("Location: product_list.php");
    }
    
    // Quitar cantidad
    if (isset($_POST['b4'])) {
        var_dump($_POST['b3']);
        // header("Location: product_list.php");
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
            <div class="col-md-10 mt-5 mt-lg-0">
                <!-- Hacer que se imprima toda la tabla -->
                <?php if (count($data) > 0) { ?>
                <?php foreach ($data as $key) { ?>
                <form method="POST" action="">                
                <div class="row mb-4" id="botones">
                    <div class="col-auto">
                        <a href="#"><img src="images/crane100x100.png" class="img-fluid"></a>
                    </div>
                    <div class="col-5 pl-0">
                        <strong>Nombre: </strong><span id="dname"><?=$data[$i]['name']?></span><br>
                        <strong>Precio: </strong><span id="dprice"><?=$data[$i]['price']?></span><br>
                        <strong>Cantidad: </strong><span id="dquantity"><?=$data[$i]['quantity']?></span><br>
                        <a class="badge badge-info" href="view_product.php?id=<?=$data[$i]['id_product']?>">Ver más...</a>
                    </div>
                    <div class="col-2" id="b1">
                        <!-- Eliminar -->
                        <button type="button" class="my-2 btn btn-danger btnGetId" value="<?=$data[$i]['id_product']?>" data-toggle="modal" data-target="#confirmation" title="Eliminar"><i class="fas fa-trash-alt"></i></button> Eliminar<br>


                        <!-- Modificar -->
                        <button type="submit" class="btn btn-warning" name="b2" value="<?=$data[$i]['id_product']?>" title="Modificar"><i class="fas fa-edit"></i></button> Modificar
                    </div>
                    <div class="col-3">
                        <!-- Agregar cantidad -->
                        <button type="button" class="my-2 btn btn-secondary" id="btnModify" name="b3" value="<?=$data[$i]['id_product']?>" title="Salida de producto" data-toggle="modal" data-target="#modifyQuantity"><i class="fas fa-sign-in-alt"></i></button> Agregar cantidad<br>
                        <!-- Quitar cantidad -->
                        <button type="button" class="btn btn-secondary" id="btnModify2" name="b4" value="<?=$data[$i++]['id_product']?>" title="Entrada de producto" data-toggle="modal" data-target="#modifyQuantity"><i class="fas fa-sign-out-alt"></i></button> Quitar cantidad
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

    <!-- Modal para eliminar un producto -->
    <div class="modal" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="confirmation" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cTitle">Eliminar producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Se muestra el producto por js -->
                    <p id="cPar1">¿Estas seguro de eliminar este producto?</p>
                    <strong>Nombre: </strong><span id="cName"></span><br>
                    <strong>Precio: </strong><span id="cPrice"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form method="POST" action="">
                        
                        <button type="submit" name="b1" id="cBtnDel" class="btn btn-danger" >Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para agregar o quitar cantidad de un producto -->
    <div class="modal" id="modifyQuantity" tabindex="-1" role="dialog" aria-labelledby="modifyQuantityTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- Título provisto por js -->
                    <h5 class="modal-title" id="mqTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="">
                <div class="modal-body">
                    <!-- Provisto por js -->
                    <p id="mqPar1"></p>
                    <p id="mqPar2">Cantidad actual: </p>
                    <div class="form-group">
                        <label for="mqNewQuantity" class="col-form-label">Cantidad</label>
                        <input type="text" class="form-control" id="mqNewQuantity">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <!-- El boton hace POST para hacer los cambios -->
                    <button type="submit" id="mqBtnExec" class="btn btn-success">Guardar cambios</button>
                </div>
                </form>
            </div>
        </div>
    </div>



<script src="script.js"></script>
<?php include 'footer.php' ?>
</body>
</html>