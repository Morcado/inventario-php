<?php 
session_start();
include 'connection.php';
$correcto = "";

if (count($_SESSION) == 0) {
    header("Location: index.php");
    return;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['confirm'])) {
        $id_product = $_SESSION['id'];
        var_dump($_SESSION);
        $quantity = $_POST['quantity'];
        $sql = "SELECT quantity FROM inventory WHERE id_product = :id_product";
        $sentence = $connection->prepare($sql);
        $sentence->bindValue(':id_product', $id_product);
        $sentence->execute();
        $data = $sentence->fetchObject();
        if ($data != false) {
            // agregar
            if ($_SESSION['opt'] == "i"){
                $quantity += $data->quantity;
                $date = date("Y-m-d H:i:s");
                $phpdate = strtotime(date("Y-m-d H:i:s"));
                $sql = "UPDATE inventory SET quantity = $quantity, ingress_date = FROM_UNIXTIME($phpdate) WHERE id_product = $id_product";
                $resp = $connection->exec($sql);
                if ($resp != false) {
                    $_SESSION['correcto'] = "Producto agregado";
                    header("Location: product_list.php");
                }
                else {
                    $_SESSION['errores'] = "El producto no se pudo agregar";
                    unset($_SESSION['errores']);
                }
            }
            // quitar
            else {
                if ($quantity <= $data->quantity) {

                    $quantity = $data->quantity - $quantity;
                    $date = date("Y-m-d H:i:s");
                    $phpdate = strtotime(date("Y-m-d H:i:s"));
                    $sql = "UPDATE inventory SET quantity = $quantity, egress_date = FROM_UNIXTIME($phpdate) WHERE id_product = $id_product";
                    $resp = $connection->exec($sql);
                    var_dump($sql);
                    if ($resp != false) {
                        $_SESSION['correcto'] = "Producto quitado";
                        header("Location: product_list.php");
                    }
                    else {
                        $_SESSION['errores'] = "El producto no se pudo quitar";
                        unset($_SESSION['errores']);
                    }
                }
                else {
                    $_SESSION['errores'] = "Cantidad excedida. Por favor elige una cantidad menor o igual que $data->quantity";
                    header("Location: product_transaction.php");

                }
            }
        }
        else {
            $errores = "Producto no encontrado";
        }
        
        
    }
    else {
        $errores = "Error al eliminar, no se eligio una opción correcta";
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
    
    <title>Agrega producto</title>
</head>
<body>
<?php include 'navbar.php' ?>
    <div class="container pt-md-5 mt-md-5 pt-sm-5 mt-sm-5">
        <?php if (isset($_SESSION['errores']) && $_SESSION['errores'] != "") { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error: </strong><?=$_SESSION['errores']?>
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
                

            <div class="col-md-5">
            <form method="POST" action="">
                <div class="form-group">
                    <?php if ($_SESSION['opt'] == "i"){ ?>
                        <label for="quantity"><h5 class="mt-3 mt-lg-0 mt-md-0 ">Cantidad de producto a agregar</h5></label>
                    <?php } else { ?>
                        <label for="quantity"><h5 class="mt-3 mt-lg-0 mt-md-0 ">Cantidad de producto a quitar</h5></label>
                    <?php } ?>
                    <input required type="number" class="form-control rounded-0" id="quantity" name="quantity" placeholder="200">
                </div>
                <div class="form-inline">
                    <div class="form-group mr-3">
                        <a href="product_list.php" class="btn btn-secondary">Cancelar</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="confirm" value="1" class="btn btn-success">Aceptar</button>
                    </div>
                </div>
            </form>

            </div>
        </div>
    </div>


<?php include 'footer.php' ?>
</body>
</html>