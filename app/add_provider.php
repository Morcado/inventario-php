<?php 
session_start();
include 'connection.php';
$errores = "";
$correcto = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['name'] != "" && $_POST['phone'] != "" && $_POST['address'] != "" && $_POST['email'] != "0") {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

        $sql = "SELECT * FROM providers WHERE name = :name";
        $sentence = $connection->prepare($sql);
        $sentence->bindValue(':name', $name);
        $sentence->execute();

        // var_dump($_POST);
        // Si el producto no esta en la base de datos
        if ($sentence->fetchObject() == false) {
            $sql = "INSERT INTO providers (name, phone, address, email) 
                    VALUES (:name, :phone, :address, :email)";
            $sentence = $connection->prepare($sql);
            $sentence->bindValue(':name', $name);
            $sentence->bindValue(':phone', $phone);
            $sentence->bindValue(':address', $address);
            $sentence->bindValue(':email', $email);
            $resultado = $sentence->execute();

            if ($resultado == false) {
                $errores = "No se pudo agregar a la base de datos";
            }
            else {
                $_SESSION['correcto'] = "Proveedor agregado";
                header("Location: provider_list.php");
            }
        }
        else {
            $errores = "El proveedor ya existe";
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
    
    <title>Agrega proveedor</title>
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


            <!-- Columna derecha -->
            <div class="col-md-5">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="name"><h5 class="mt-3 mt-lg-0 mt-md-0 ">Nombre</h5></label>
                        <input required type="input" class="form-control rounded-0" id="name" name="name" placeholder="David B. Kelley">
                    </div>
                    <div class="form-group">
                        <label for="phone"><h5>Teléfono</h5></label>
                        <input required type="input" class="form-control rounded-0" id="phone" name="phone" placeholder="703-840-7835">
                    </div>
                    <div class="form-group">
                        <label for="address"><h5>Dirección</h5></label>
                        <input required type="input" class="form-control rounded-0" id="address" name="address" placeholder="2694 Forest Drive Culpeper, VA 22701">
                    </div>
                    <div class="form-group">
                        <label for="email"><h5>Correo electrónico</h5></label>
                        <input required type="input" class="form-control rounded-0" id="email" name="email" placeholder="DavidBKelley@armyspy.com">
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