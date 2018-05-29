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
else {
    die("No se pudo cargar los proveedores");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['name'] != "" && $_POST['description'] != "" && $_POST['price'] != "" && $_POST['provider'] != "-1" 
        && $_FILES['fileToUpload']['name'] != "") {
        $image = $_FILES["fileToUpload"]['tmp_name'];
        $destiny = 'inventory_images/' . $_FILES['fileToUpload']['name'];

        // var_dump($_FILES['fileToUpload']['name']);

        // var_dump($destiny);


        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $price = floatval(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT));
        $provider = filter_input(INPUT_POST, 'provider', FILTER_SANITIZE_STRING);

        $sql = "SELECT * FROM inventory WHERE name = :name";
        $sentence = $connection->prepare($sql);
        $sentence->bindValue(':name', $name);
        $sentence->execute();

        // Si el producto no esta en la base de datos
        if ($sentence->fetchObject() == false) {
            //$sql = "INSERT INTO inventory (name, description, price, provider, image) VALUES (:name, :description, :price, :provider, :image)";
            $sql = "INSERT INTO inventory SET name = :name, description = :description, price = :price, provider = :provider, image = :image";
            $sentence = $connection->prepare($sql);
            $sentence->bindValue(':name', $name);
            $sentence->bindValue(':description', $description);
            $sentence->bindValue(':price', $price);
            $sentence->bindValue(':provider', $provider);
            $sentence->bindValue(':image', $_FILES['fileToUpload']['name']);



                    print_r($image);
                    if (move_uploaded_file($image, $destiny)) {
                        // $correcto = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                        $resultado = $sentence->execute();

                        if ($resultado == false) {
                            $errores = "No se pudo agregar a la base de datos";
                        }
                        else {
                            $correcto = "Producto agregado";
                        }
                    }
                    else {
                        $errores = "El archivo no se pudo subir";

                    }
                
            
        }
        else {
            $errores = "El producto ya existe";
        }
        
    }
    else {
        $errores = "Por favor rellena todos los campos";
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
        <form method="POST" action="" enctype="multipart/form-data">
        <div class="row">
<?php include 'navigation.php' ?>

            <div class="col-md-5 mt-5 mt-lg-0">
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
            </div>

            <!-- Columna derecha -->
            <div class="col-md-5">
                    <div class="form-group">
                        <label for="name"><h5 class="mt-3 mt-lg-0 mt-md-0 ">Nombre del producto</h5></label>
                        <input required type="input" class="form-control rounded-0" id="name" name="name" placeholder="Papel Kami">
                    </div>
                    <div class="form-group">
                        <label for="description"><h5>Descripción del producto</h5></label>
                        <textarea required class="form-control rounded-0" id="description" name="description" rows="3" placeholder="Papel delgado con color de un lado..."></textarea>
                    </div>  
                    <div class="form-group">
                        <label for="price"><h5>Precio</h5></label>
                        <input required type="input" class="form-control rounded-0" id="price" name="price" placeholder="100.00">
                    </div>
                    <div class="form-group">
                        <label for="provider"><h5>Proveedor</h5></label>
                        <select required class="form-control rounded-0" id="provider" name="provider">

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
                        <button type="submit" class="btn color-tema text-light rounded-0 my-sm-0 px-5">Guardar</button>
                    </div>
            </div>
        </div>
        </form>
    </div>


<?php include 'footer.php' ?>
</body>
</html>