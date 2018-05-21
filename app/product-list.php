<?php 
session_start();
include 'connection.php';

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
    
    <title>Lista de productos</title>
</head>
<body>
    <!-- Nav bar -->
<nav class=" navbar navbar-expand-lg navbar-expand-md navbar-dark fixed-top color-tema">

    <!-- Logotipo -->
    <a class="d-none d-sm-block" href="#" ><img src="holder.js/50x50/"></a>
    <button class="navbar-toggler mr-auto ml-3" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon outline"></span>
    </button>
    <p class="navbar-brand ml-3 d-none d-sm-block">Empresa</p>
    <div class="ml-5 text-white">
        <script type="text/javascript"></script>
        <h4>Lista de productos</h4>
    </div>
    <!-- Menu -->
<?php include 'header.php' ?>

<div class="col-md-10 mt-5 mt-lg-0">
                <!-- Hacer que se imprima toda la tabla -->
                <div class="row mb-4">
                    <div class="col-auto">
                        <a href="#"><img src="holder.js/100x100" class="img-fluid"></a>
                    </div>
                    <div class="col-5 pl-0">
                        <h5>Nombre</h5>
                        <h5>Marca</h5>
                        <h5>Cantidad</h5>
                    </div>
                    <div class="col-1">
                        <h2><i class="fas fa-times"></i></h2>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-auto">
                        <a href="#"><img src="holder.js/100x100" class="img-fluid"></a>
                    </div>
                    <div class="col-5 pl-0">
                        <h5>Nombre</h5>
                        <h5>Marca</h5>
                        <h5>Cantidad</h5>
                    </div>
                    <div class="col-1">
                        <h2><i class="fas fa-times"></i></h2>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-auto">
                        <a href="#"><img src="holder.js/100x100" class="img-fluid"></a>
                    </div>
                    <div class="col-5 pl-0">
                        <h5>Nombre</h5>
                        <h5>Marca</h5>
                        <h5>Cantidad</h5>
                    </div>
                    <div class="col-1">
                        <h2><i class="fas fa-times"></i></h2>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-auto">
                        <a href="#"><img src="holder.js/100x100" class="img-fluid"></a>
                    </div>
                    <div class="col-5 pl-0">
                        <h5>Nombre</h5>
                        <h5>Marca</h5>
                        <h5>Cantidad</h5>
                    </div>
                    <div class="col-1">
                        <h2><i class="fas fa-times"></i></h2>
                    </div>
                </div>
                
            </div>

<?php include 'footer.php' ?>