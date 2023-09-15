<?php
// buscar_productos.php

// Archivo con la conexión a la base de datos
include "../conexion.php";
// Obtener la consulta del campo de búsqueda
$consulta = $_POST['consulta'];

// Realizar la consulta a la base de datos
$sql = "SELECT id AS id, nombre_producto AS nombre FROM productos WHERE nombre_producto LIKE '%$consulta%'";
$resultado = mysqli_query($conexion, $sql);

// Obtener los resultados de la consulta
$productos = array();
while ($producto = mysqli_fetch_assoc($resultado)) {
    $productos[] = $producto;
}

// Devolver los resultados en formato JSON
header('Content-Type: application/json');
echo json_encode($productos);
?>


