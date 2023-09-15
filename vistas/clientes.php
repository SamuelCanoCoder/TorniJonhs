<?php
include "../conexion.php";

?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<!-- Incluye el archivo JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="shortcut icon" href="../img/Favicon.ico" type="image/x-icon">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TorniJonhs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../Style/estilosInicio.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
</head>

<body>

    <div class="sidebar">
        <a href="../inicio.php" class="menu-link"><i class="fa-solid fa-circle-left"></i> Volver</a>
        <a type="button" class="menu-link" data-bs-toggle="modal" data-bs-target="#AgregarClientes"><i class="fa-solid fa-plus"></i> Agregar Cliente</a>
        <a href="../cerrarSesion.php" name="btncerrar"><i class="fa-solid fa-right-from-bracket"></i> <strong> Cerrar Sesión</strong></a>

    </div>

    <div class="content" id="contenido">


        <div class="modal fade" id="AgregarClientes" tabindex="-1" aria-labelledby="miVentanaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="miVentanaModalLabel">Agrega nuevo cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" id="formAgregarProducto">
                        <div class="modal-body">
                            <p>Registra los datos para el nuevo cliente</p>

                            <label for="cedula" class="label-form mt-4">Cédula o NIT</label>
                            <input type="text" class="form-control" id="cedula" name="cedula" required>

                            <label for="nombre" class="label-form mt-4">Nombre</label>
                            <input type="number" class="form-control" id="nombre" name="nombre" required>

                            <label for="correo" class="label-form mt-4">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" required>

                            <label for="direccion" class="label-form mt-4">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required>

                            <label for="telefono" class="label-form mt-4">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnRegistrar" class="btn btn-success">Registrar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!-- SCRIPT PARA EL REGISTRO DE PRODUCTOS::: -->

<script>
$(document).ready(function() {
    // Envío del formulario usando AJAX
    $("#btnRegistrar").on("click", function() {
        var cedula = $("#cedula").val();
        var nombre = $("#nombre").val();
        var correo = $("#correo").val();
        var direccion = $("#direccion").val();
        var telefono = $("#telefono").val();

        $.ajax({
            type: "POST",
            url: "../acciones/agregar_clientes.php",
            data: {
                nombre: nombre,
                precio: precio,
                categoria: categoria
            },
            success: function(response) {
                // Si el registro se realiza correctamente, actualizamos la tabla con el nuevo producto
                $("#TablaTodosProductos tbody").append(response);

                // Cerramos la ventana modal
                $("#AgregarClientes").modal("hide");
                
                // Limpiamos los campos del formulario
                $("#nombre").val("");
                $("#precio").val("");
                $("#categoria").val("");
            },
            error: function() {
                alert("Ha ocurrido un error al registrar el producto.");
            }
        });
    });

    // Configuración de DataTables
    $('#TablaTodosClientes').DataTable({
        language: espanol
    });
});
</script>


<!-- FIN SCRIPT -->

        <h2 class="text-center mt-4"><i class="fa-solid fa-users"> Clientes</i></h2>
        <div id="CajaProductos" class="mt-5 m-5 p-4">
            <?php
            $consultaClientes = mysqli_query($conexion, "SELECT * FROM clientes");
            ?>
            <table id="TablaTodosClientes">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($mostrar = mysqli_fetch_array($consultaClientes)) {
                    ?>
                        <tr>
                            <td><?php echo $mostrar['id'] ?></td>
                            <td><?php echo $mostrar['nombre'] ?></td>
                            <td><?php echo $mostrar['correo'] ?></td>
                            <td><?php echo $mostrar['direccion'] ?></td>
                            <td><?php echo $mostrar['telefono'] ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>

        <script src="../js/idiomaTablas.js"></script>
        <!-- <script>
            $(document).ready(function() {
                $('#TablaTodosProductos').DataTable({
                    language: espanol
                });
            });
        </script> -->

    </div>
</body>

</html>