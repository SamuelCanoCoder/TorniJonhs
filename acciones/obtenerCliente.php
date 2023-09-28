<?php
include "../conexion.php";

if (isset($_GET['id'])) {
    $idCliente = $_GET['id'];

    // Realiza una consulta para obtener la información del cliente con el ID dado
    $consultaCliente = mysqli_query($conexion, "SELECT * FROM clientes WHERE id = $idCliente");
    
    if ($consultaCliente) {
        $cliente = mysqli_fetch_assoc($consultaCliente);
        echo json_encode($cliente); // Devuelve la información del cliente en formato JSON
    } else {
        echo json_encode(array("error" => "Error al obtener la información del cliente."));
    }
} else {
    echo json_encode(array("error" => "ID del cliente no proporcionado."));
}
?>
