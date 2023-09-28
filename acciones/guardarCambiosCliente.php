<?php
//EDITAR CLIENTE
// Verificar si se han enviado los datos del formulario
if (isset($_POST['cedula']) && isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['direccion']) && isset($_POST['telefono'])) {
    // Obtener los datos del formulario
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    include "../conexion.php";

    $sql = "UPDATE clientes SET nombre='$nombre', correo='$correo', direccion='$direccion', telefono='$telefono' WHERE id='$cedula'";
    if (mysqli_query($conexion, $sql)) {
        echo "Actualizado";
    } else {
        echo "Error al registrar el producto: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
} else {
    echo "Error: Datos del formulario no recibidos.";
}
?>
