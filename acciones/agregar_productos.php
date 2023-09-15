<?php
// agregar_producto.php

// Verificar si se han enviado los datos del formulario
if (isset($_POST['nombre']) && isset($_POST['precio']) && isset($_POST['categoria'])) {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];

    // Realizar el registro en la base de datos
    include "../conexion.php"; // Asegúrate de incluir el archivo con la conexión a la base de datos

    // Consulta para insertar el nuevo producto en la tabla 'productos'
    $sql = "INSERT INTO productos (nombre_producto, precio_actual, categoria_id) VALUES ('$nombre', '$precio', '$categoria')";

    if (mysqli_query($conexion, $sql)) {
        // Obtener el ID del nuevo producto recién registrado
        $nuevoProductoID = mysqli_insert_id($conexion);

        // Generar el HTML de la nueva fila para la tabla
        $htmlNuevaFila = '
            <tr>
                <td>' . $nuevoProductoID . '</td>
                <td>' . $nombre . '</td>
                <td>' . $precio . '</td>
                <td>' . $categoria . '</td>
            </tr>
        ';

        // Devolver el HTML generado para agregar la nueva fila a la tabla
        echo $htmlNuevaFila;
    } else {
        echo "Error al registrar el producto: " . mysqli_error($conexion);
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conexion);
} else {
    // Si no se han enviado los datos del formulario, mostrar un mensaje de error
    echo "Error: Datos del formulario no recibidos.";
}
?>
