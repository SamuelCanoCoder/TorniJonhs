<?php
// Verificar si se han enviado los datos del formulario
if (isset($_POST['cedula']) && isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['direccion']) && isset($_POST['telefono'])) {
    // Obtener los datos del formulario
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    include "../conexion.php";

    // Consulta para verificar si la cédula ya existe en la base de datos
    $verificarCedulaSQL = "SELECT id FROM clientes WHERE id = '$cedula'";
    $resultado = mysqli_query($conexion, $verificarCedulaSQL);

    if (mysqli_num_rows($resultado) > 0) {
?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                title: 'Verifique la Cédula o el NIT',
                text: 'Ya existe un cliente registrado con la misma identificación.',
                showConfirmButton: false,
                timer: 4000
            })
        </script>


<?php
    } else {
        // Consulta para insertar el nuevo CLIENTE
        $sql = "INSERT INTO clientes (id, nombre, correo, direccion, telefono) VALUES ('$cedula', '$nombre', '$correo', '$direccion', '$telefono')";

        if (mysqli_query($conexion, $sql)) {
            // Obtener el ID del nuevo producto recién registrado
            /* $nuevoClienteID = mysqli_insert_id($conexion); */

            // Generar el HTML de la nueva fila para la tabla
            $htmlNuevaFila = '
                <tr>
                    <td>' . $cedula . '</td>
                    <td>' . $nombre . '</td>
                    <td>' . $correo . '</td>
                    <td>' . $direccion . '</td>
                    <td>' . $telefono . '</td>
                    <td><a data-bs-toggle="modal" data-bs-target="#EditarClientes" class="btn btn-primary editar-cliente" data-cliente-id="' . $cedula . '"><i class="fa-solid fa-pen-to-square"></i></a></td>
                </tr>';

            // Devolver el HTML generado para agregar la nueva fila a la tabla
            echo $htmlNuevaFila;
        } else {
            echo "Error al registrar el producto: " . mysqli_error($conexion);
        }
    }

    // Cerrar la conexión
    mysqli_close($conexion);
} else {
    echo "Error: Datos del formulario no recibidos.";
}
?>