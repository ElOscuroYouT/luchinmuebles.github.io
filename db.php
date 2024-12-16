<?php
$host = 'localhost';  // Nombre del host (servidor donde está la base de datos)
$dbname = 'muebles';  // Nombre de la base de datos
$username = 'root';  // Usuario de la base de datos (en este caso 'root' en un servidor local)
$password = '';  // Contraseña (en este caso vacía para el servidor local)

// Establecer la conexión a la base de datos
$con = new mysqli($host, $username, $password, $dbname);

// Verificar si hay error en la conexión
if ($con->connect_error) {
    die("Error de conexión: " . $con->connect_error);  // Muestra un mensaje de error si la conexión falla
}
?>

