<?php 
session_start();
include 'connection.php';
$errores = "";
$correcto = "";

if (count($_SESSION) == 0) {
    header("Location: index.php");
    return;
}

$sql = "SELECT id_product, name, price, quantity, provider, ingress_date, egress_date FROM inventory";
$respuesta = $connection->query($sql);
if ($respuesta != null) {
    $data = $respuesta->fetchAll(PDO::FETCH_NUM);
 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

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
        <?php if ($_SESSION['username'] == "admin") { ?>
        <div class="row">
<?php include 'navigation.php' ?>
            <div class="col-md-10">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Dombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Proveedor</th>
                        <th>Fecha de ingreso</th>
                        <th>Fecha de egreso</th>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $key): ?>
                        <tr>
                            <td><?=$key[0]?></td>
                            <td><?=$key[1]?></td>
                            <td><?=$key[2]?></td>
                            <td><?=$key[3]?></td>
                            <td><?=$key[4]?></td>
                            <td><?=$key[5]?></td>
                            <td><?=$key[6]?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php } else { ?>
        
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error: </strong>No tiene los suficientes permisos para entrar aqui
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php include 'navigation.php' ?>
        <?php } ?>
    </div>


<?php include 'footer.php' ?>
</body>
</html>