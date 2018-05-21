<?php 
$fuente = "mysql:host=localhost;dbname=proyecto_inventario";
$usuario ="root";
$contraseña ="root";
try {
    $connection = new PDO($fuente, $usuario, $contraseña);
}
catch (PDOException $e) {
    echo 'Error en la conexion' . $e->getMessage();
}

?>