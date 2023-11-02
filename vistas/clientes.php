<?php
include "../conexion.php";
include "../validar_sesion.php";
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<!-- Incluye el archivo JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>
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

    <!-- PANTALLA DE CARGA:: -->
    <div id="loader">
        <img src="../img/Cargando.gif" alt="Indicador de carga">
    </div>

    <div class="sidebar">
        <a href="../inicio.php" class="menu-link"><i class="fa-solid fa-circle-left"></i> Volver</a>
        <a type="button" class="menu-link" data-bs-toggle="modal" data-bs-target="#AgregarClientes"><i class="fa-solid fa-plus"></i> Agregar Cliente</a>
        <a href="../cerrarSesion.php" name="btncerrar"><i class="fa-solid fa-right-from-bracket"></i> <strong> Cerrar Sesión</strong></a>

    </div>

    <div class="content" id="contenido">

        <!-- MODAL PARA AGREGAR CLIENTE -->
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
                            <input type="text" class="form-control" id="nombre" name="nombre" required>

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
        <!-- FIN MODAL PARA AGREGAR CLIENTE -->

        <!-- MODAL PARA EDITAR CLIENTES: -->
        <div class="modal fade" id="EditarClientes" tabindex="-1" aria-labelledby="miVentanaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="miVentanaModalLabel">Editar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" id="formAgregarProducto">
                        <div class="modal-body">
                            <p>Edite la información del cliente</p>

                            <label for="cedula" class="label-form mt-4">Cédula o NIT</label>
                            <input type="text" readonly class="form-control" id="cedula2" name="cedula2" required>

                            <label for="nombre" class="label-form mt-4">Nombre</label>
                            <input type="text" class="form-control" id="nombre2" name="nombre2" required>

                            <label for="correo" class="label-form mt-4">Correo</label>
                            <input type="email" class="form-control" id="correo2" name="correo2" required>

                            <label for="direccion" class="label-form mt-4">Dirección</label>
                            <input type="text" class="form-control" id="direccion2" name="direccion2" required>

                            <label for="telefono" class="label-form mt-4">Teléfono</label>
                            <input type="text" class="form-control" id="telefono2" name="telefono2" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnRegistrarCambios" class="btn btn-success">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- FIN MODAL PARA EDITAR CLIENTES -->


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
                        <th style="width: 0 auto;"></th>
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
                            <td><?php echo '<a data-bs-toggle="modal" data-bs-target="#EditarClientes" class="btn btn-primary editar-cliente" data-cliente-id="' . $mostrar['id'] . '"><i class="fa-solid fa-pen-to-square"></i></a>' ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
        <script src="../js/idiomaTablas.js"></script>
    </div>


    <!-- SCRIPT PARA EL REGISTRO DE CLIENTES::: -->

    <script>
        // Configuración de DataTables
        $('#TablaTodosClientes').DataTable({
            language: espanol
        });

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
                        cedula: cedula,
                        nombre: nombre,
                        correo: correo,
                        direccion: direccion,
                        telefono: telefono
                    },
                    success: function(response) {
                        // Si el registro se realiza correctamente, actualizamos la tabla con el nuevo producto
                        $("#TablaTodosClientes tbody").append(response);

                        // Cerramos la ventana modal
                        $("#AgregarClientes").modal("hide"); //Cerrar modal y actualizar la fila nueva

                        // Limpiamos los campos del formulario
                        $("#cedula").val("");
                        $("#nombre").val("");
                        $("#correo").val("");
                        $("#direccion").val("");
                        $("#telefono").val("");
                    },
                    error: function() {
                        alert("Ha ocurrido un error al registrar el producto.");
                    }
                });
            });

            /* SCRIPT PARA LA ACTUALIZACIÓN DEL CLIENTE:: */

            $("#btnRegistrarCambios").on("click", function() {
                var cedula2 = $("#cedula2").val();
                var nombre2 = $("#nombre2").val();
                var correo2 = $("#correo2").val();
                var direccion2 = $("#direccion2").val();
                var telefono2 = $("#telefono2").val();

                $.ajax({
                    type: "POST",
                    url: "../acciones/guardarCambiosCliente.php",
                    data: {
                        cedula: cedula2,
                        nombre: nombre2,
                        correo: correo2,
                        direccion: direccion2,
                        telefono: telefono2
                    },
                    success: function(response) {
                        // Cerrar la ventana modal
                        $("#EditarClientes").modal("hide"); //Cerrar modal
                        Swal.fire({
                            icon: 'success',
                            title: 'Cliente editado exitosamente',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(() => {
                            location.reload();
                        });
                        
                    },
                    error: function() {
                        alert("Ha ocurrido un error al registrar el producto.");
                    }
                });
            });


        });

        /* PANTALLA DE CARGA: */

        window.addEventListener('load', function() {
            var loader = document.getElementById('loader');
            loader.style.display = 'none';
        });
    </script>
    <!-- FIN SCRIPT -->

    <!-- SCRIPT PARA OBTENER CLIENTE Y MOSTRAR LA INFORMACIÓN EN LA MODAL -->
    <script>
        function llenarModalCliente(idCliente) {
            $.ajax({
                type: "GET",
                url: "../acciones/obtenerCliente.php?id=" + idCliente,
                dataType: "json",
                success: function(cliente) {
                    $("#cedula2").val(cliente.id);
                    $("#nombre2").val(cliente.nombre);
                    $("#correo2").val(cliente.correo);
                    $("#direccion2").val(cliente.direccion);
                    $("#telefono2").val(cliente.telefono);
                },
                error: function() {
                    alert("Error al obtener la información del cliente.");
                }
            });
        }

        $(document).on("click", ".editar-cliente", function() {
            var idCliente = $(this).data("cliente-id");
            llenarModalCliente(idCliente);
        });

        $('#EditarClientes').on('hidden.bs.modal', function() {
            $("#cedula2").val("");
            $("#nombre2").val("");
            $("#correo2").val("");
            $("#direccion2").val("");
            $("#telefono2").val("");
        });
    </script>


</body>

</html>