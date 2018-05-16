<?php 
$fuente = "mysql:host=localhost;dbname=kardexdb";
$usuario ="root";
$contraseña ="root";
try {
    $conexion = new PDO($fuente, $usuario, $contraseña);
}
catch (PDOException $e) {
    echo 'Error en la conexion' . $e->getMessage();
}

?>