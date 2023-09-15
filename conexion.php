<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tornijohns";

// Crear la conexión
$conexion = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
/* echo "Conexión exitosa"; */
?>
