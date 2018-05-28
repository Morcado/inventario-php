<?php 
session_start();

if (count($_SESSION) == 0) {
    header("Location: index.php");
    return;
}

$data = [];

// $myFile = fopen($fileName, "r") or die("No se encuentra el archivo: " . $fileName); 
// Lee todo el archivo para guardarlo en un parcial
// var_dump($fileName);
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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data[0] = $_POST['quien'];
    $data[1] = $_POST['phone'];
    $data[2] = $_POST['address'];
    $data[3] = $_POST['email'];
    if (($myFile = fopen("acerca.txt", "w")) != FALSE) {
        fwrite($myFile, $data[0].PHP_EOL);
        fwrite($myFile, $data[1].PHP_EOL);
        fwrite($myFile, $data[2].PHP_EOL);
        fwrite($myFile, $data[3].PHP_EOL);
        fclose($myFile);
    }
    header("Location: about.php");
}
// var_dump($subject);


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
                <div class="col-md-7 mt-5 mt-lg-0 mt-sm-0 form-group">
                <form class="form-group" method="post" action="">
                    <div class="form-group">
                        <label for="quien"><h2>Quienes somos</h2></label>
                        <textarea required type="input" class="form-control rounded-0" id="quien" name="quien" placeholder="Papel delgado de tamaño..."><?=$data[0]?></textarea>
                    </div>
                    <h2>Contacto</h2>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input required type="input" class="form-control rounded-0" id="phone" name="phone" value="<?=$data[1]?>" placeholder="515-324-6445">
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input required type="input" class="form-control rounded-0" id="address" name="address" value="<?=$data[2]?>" placeholder="3444 Hazelwood Avenue West Des Moines, IA 50266">
                    </div>
                    <div class="form-group">
                        <label for="email">Correl electrónico</label>
                        <input required type="input" class="form-control rounded-0" id="email" name="email" value="<?=$data[3]?>" placeholder="DonnaNHallock@jourrapide.com">
                    </div>
                    <button type="submit" class="btn color-tema text-light">Guardar</button>
                </form>
                </div>
            </div>
        </div>
<?php include 'footer.php' ?>
</body>
</html>