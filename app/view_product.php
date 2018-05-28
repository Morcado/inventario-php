<?php 
session_start();
include 'connection.php';

if (count($_SESSION) == 0) {
    header("Location: index.php");
    return;
}

$errores = "";
$correcto = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    header("Location: edit_product.php");
}

if (isset($_GET['id'])) {
    $id_product = $_GET['id'];
    $sql = "SELECT * FROM inventory WHERE id_product = $id_product";
    $result = $connection->query($sql);
    if ($result != false) {
        $data = $result->fetch(PDO::FETCH_NAMED);
        if ($data == false) {
            $errores = "Producto no existe";
        }
    }
    else {
        $errores = "Error en la busqueda";
    }
}
else {
    $errores = "Producto no seleccionado";
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
    
    <title>Ver producto</title>
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
        <?php } ?>
        <div class="row">
<?php include 'navigation.php' ?>
            <?php if (isset($id_product)): ?>
                
            <div class="col-md-5 mt-5 mt-lg-0 mt-md-0">
                <a href="#"><img src="images/crane700x700.png" class="img-fluid"></a>
            </div>
            <div class="col-md-5">
                <div>
                    <h5 class="mt-3 mt-lg-0 mt-md-0">Nombre del producto</h5>
                    <p><?=$data['name']?></p>
                </div>
                <div>
                    <h5>Descripción del producto</h5>
                    <p><?=$data['description']?></p>
                </div>
                <div>
                    <h5>Precio</h5>
                    <p><?=$data['price']?></p>
                </div>
                <div>
                    <h5>Cantidad</h5>
                    <p><?=$data['quantity']?></p>
                </div>
                <div>
                    <h5>Proveedor</h5>
                    <p><?=$data['provider']?></p>
                </div>
                <div>
                    <h5>Fecha de ingreso reciente</h5>
                    <p><?=$data['ingress_date']?></p>
                </div>
                <div>
                    <h5>Fecha de egreso reciente</h5>
                    <p><?=$data['egress_date']?></p>
                </div>
                <form method="post" action="">
                    <button type="submit" class="btn color-tema text-light my-sm-0 px-5 mb-3 mb-lg-3">Editar</button>
                </form>
            </div>
            <?php endif ?>
        </div>
    </div>
    <!-- </main> -->

<?php include 'footer.php' ?>

    </body>
    </html>