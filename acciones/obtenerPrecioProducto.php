<?php
// obtenerPrecioProducto.php

// Archivo con la conexión a la base de datos
include "../conexion.php";

// Obtener el nombre del producto desde la solicitud AJAX
$nombreProducto = $_POST['producto'];

// Utilizar una consulta preparada para evitar inyección SQL
$sql = "SELECT precio_actual FROM productos WHERE nombre_producto = ?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "s", $nombreProducto);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $precioProducto);

// Verificar si se encontró el producto y obtener el precio
if (mysqli_stmt_fetch($stmt)) {
    // Devolver el precio en formato JSON
    echo json_encode(array('precio' => $precioProducto));
} else {
    // Si no se encontró el producto, devolver un mensaje de error en formato JSON
    echo json_encode(array('error' => 'Producto no encontrado'));
}

// Cerrar la consulta preparada
mysqli_stmt_close($stmt);
mysqli_close($conexion);
?>
