<?php 
session_start();
include 'connection.php';
$errors = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // var_dump($_POST);
    if ($_POST['username'] != "" && $_POST['password'] != "") {
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        $sql = "SELECT * FROM users WHERE username = :username";
        $sentence = $connection->prepare($sql);
        $sentence->bindValue(':username', $username);
        $sentence->execute();

        $data = $sentence->fetchObject();
        // Consutar la base de datos y comaprar los bslores
        if ($data != false && $password == $data->password /*password_verify($password, $data->password*/ ) {
            $_SESSION['username'] = $username;
            header('Location: add_product.php');
            return;
        }
        else {
            $errors = "Usuario o contraseña no válido";
        }
    }
    else {
        $errors = "Por favor llena todos los campos";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity=" sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.min.js"></script>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Inventario</title>
</head>
<body>
    <!-- Nav bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top color-tema">

        <!-- Logotipo -->
        <a href="#" ><img src="holder.js/50x50/"></a>
        <button class="navbar-toggler mr-auto ml-3" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon outline"></span>
        </button>

        <a class="navbar-brand ml-3" href="#">Empresa</a>

        <!-- Elementos del nav bar -->

        <!-- Menu -->

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mr-auto">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#">Features</a>
                <a class="nav-item nav-link" href="#">Pricing</a>
                <a class="nav-item nav-link disabled" href="#">Disabled</a>
            </div>
        </div>
    </nav>

        <div class="container pt-5">
            <div class="row justify-content-center my-5">
                <div class="col col-md-4 text-center mt-5">
                    <img src="holder.js/200x200/" class="img-fluid" alt="Responsive image">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col col-md-4 mx-4 text-center">
                    <form method="POST" action="">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-success" id="username" name="username" placeholder="Nombre de usuario">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                        </div>
                        <button type="submit" class="btn btn-success mb-3">Iniciar sesión</button>
                        <?php if ($errors != ""): ?>
                        <p><?=$errors?></p>
                        <?php $errors = ""; endif ?>
                    </form>
                </div>
            </div>
        </div>
        <!-- </main> -->

        <!--Footer-->
        <footer class="footer font-small">

            <!--Footer Links-->
            <div class="color-tema">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Acerca de</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Ayuda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Términos y condiciones</a>
                    </li>
                </ul>
            </div>

        </footer>
        <!--/.Footer-->

    </body>
    </html>