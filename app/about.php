<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
if (count($_SESSION) == 0) {
    header("Location: index.php");
    return;
}

$data = [];
if (($myFile = fopen("acerca.txt", "r")) != FALSE) {
    $i = 0;
    while (($line = fgets($myFile)) !== false) {
        $data[$i] = $line;
        $i++;
    }
    $data = array_values(array_filter($data, "trim"));
    fclose($myFile);
}
else {
    die("Error al abrir el archivo");
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
    
    <title>Acerca de</title>
</head>
<body>
<?php include 'navbar.php' ?>
        <div class="container pt-md-5 mt-md-5 pt-sm-5 mt-sm-5">
            <div class="row">
                    
<?php include 'navigation.php' ?>
                <div class="col-md-7 mt-5 mt-lg-0 mt-sm-0">
                    <h2>Quienes somos</h2>
                    <p><?=$data[0]?></p>
                    <h2>Contacto</h2>
                    <strong>Telefono: </strong><p><?=$data[1]?></p>
                    <strong>Dirección: </strong><p><?=$data[2]?></p>
                    <strong>Correo electrónico: </strong><p><?=$data[3]?></p>
                </div>
            </div>
        </div>
<?php include 'footer.php' ?>
</body>
</html>