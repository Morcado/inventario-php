<?php 
session_start();
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
    
    <title>Ayuda</title>
</head>
<body>
<?php include 'navbar.php' ?>
        <div class="container pt-md-5 mt-md-5 pt-sm-5 mt-sm-5">
            <div class="row">
<?php include 'navigation.php' ?>
                <div class="col-md-7 mt-5 mt-lg-0 mt-sm-0">
                    <h2>Ayuda</h2>
                    <p>Para manejar el entorno en la barra lateral izquierda se encuentran los botones
                    para navegar a traves del inventario donde podrá agregar un producto, eliminar
                    un producto, modificar un producto, etc.</p>

                    <h3>Agregar un producto nuevo</h3>
                    <p>Cuando un producto nuevo se quiere agregar al inventario. Si el producto ya existe
                    se notifica si se desea modificar dicho producto</p>
                    <h6>Elementos a considerar al agregar un producto nuevo</h6>
                    <ul>
                        <li>Nombre del producto</li>
                        <li>Descripción del producto</li>
                        <li>Precio del producto</li>
                        <li>Categoría del producto</li>
                    </ul>

                    <h3>Modificar un producto existente</h3>
                    <p>El producto se puede modificar cuando las características del producto cambian, cuando se 
                    encuentra algun error en los datos del producto o se quiere cambiar de categoría.
                    Los datos que se pueden modificar son los siguientes</p>
                    <h6>Elementos que se pueden modificar de un producto</h6>
                    <ul>
                        <li>Nombre del producto</li>
                        <li>Descripción del producto</li>
                        <li>Precio del producto</li>
                        <li>Categoría</li>
                    </ul>

                    <h3>Ver un producto</h3>
                    <p>Se puede ver las características completas de un producto que se encuentra en el inventario</p>
                    <h6>Características</h6>
                    </ul>
                    <ul>
                        <li>Nombre del producto</li>
                        <li>Descripción del producto</li>
                        <li>Precio del producto</li>
                        <li>Cantidad</li>
                        <li>Categoría del producto</li>
                        <li>Fecha de ingreso</li>
                        <li>Fecha de egreso</li>
                    </ul>

                    <h3>Ingreso de un producto existente</h3>
                    <p>Cuando llegan nuevas existencias de un producto al inventario. Se selecciona un producto y se agrega 
                    la nueva cantidad del producto a la cantidad ya existente del inventario. Se actualiza 
                    la última fecha de ingreso.</p>
                    <ul>
                        <li>Cantidad</li>
                        <li>Fecha de ingreso</li>
                    </ul>

                    <h3>Egreso de un producto existente</h3>
                    <p>Cuando salen existencias de un producto del inventario. Se selecciona un producto y se indica  
                    la cantidad del producto a restar del inventario. Se actualiza la última fecha de egreso. Si no hay 
                    suficiente existencia, se notifica y no se puede realizar la salida del producto.</p>
                    <h6>Elementos a considerar</h6>
                    <ul>
                        <li>Cantidad</li>
                        <li>Fecha de egreso</li>
                    </ul>
                    
                    <h3>Eliminar un producto</h3>
                    <p>Eliminar un producto del inventario porque ya no se va a manejar ese producto. Se preguntará</p>
                </div>
            </div>
        </div>
<?php include 'footer.php' ?>