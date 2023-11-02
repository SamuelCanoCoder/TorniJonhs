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
        <a type="button" class="menu-link" data-bs-toggle="modal" data-bs-target="#AgregarProductos"><i class="fa-solid fa-plus"></i> Agregar producto</a>
        <a href="../cerrarSesion.php" name="btncerrar"><i class="fa-solid fa-right-from-bracket"></i> <strong> Cerrar Sesión</strong></a>
    </div>


    <!-- CONTENIDO DE LA PAGINA: -->
    <div class="content" id="contenido">
        <div class="modal fade" id="AgregarProductos" tabindex="-1" aria-labelledby="miVentanaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="miVentanaModalLabel">Agrega nuevos productos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" id="formAgregarProducto">
                        <div class="modal-body">
                            <!-- Contenido de la ventana modal aquí -->
                            <p>Registra los datos para el nuevo producto</p>

                            <label for="nombre" class="label-form mt-4">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre">

                            <label for="precio" class="label-form mt-4">Precio</label>
                            <input type="number" class="form-control" id="precio" name="precio">

                            <label for="categoria" class="label-form mt-4">Categoría</label>
                            <input type="text" class="form-control" id="categoria" name="categoria">
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btnRegistrar" class="btn btn-success">Registrar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <h2 class="text-center mt-4"><i class="fa-solid fa-boxes-stacked"> Productos</i></h2>
        <div id="CajaProductos" class="mt-5 m-5 p-4">
            <?php
            $consultaProductos = mysqli_query($conexion, "SELECT * FROM productos");
            ?>
            <table id="TablaTodosProductos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Producto</th>
                        <th>Precio Actual</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($mostrar = mysqli_fetch_array($consultaProductos)) {
                    ?>
                        <tr>
                            <td><?php echo $mostrar['id'] ?></td>
                            <td><?php echo $mostrar['nombre_producto'] ?></td>
                            <td><?php echo $mostrar['precio_actual'] ?></td>
                            <td><?php echo $mostrar['categoria_id'] ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- SCRIPT PARA EL REGISTRO DE PRODUCTOS::: -->
    <script src="../js/idiomaTablas.js"></script>
    <script>
        $(document).ready(function() {
            // Envío del formulario usando AJAX
            $("#btnRegistrar").on("click", function() {
                var nombre = $("#nombre").val();
                var precio = $("#precio").val();
                var categoria = $("#categoria").val();

                $.ajax({
                    type: "POST",
                    url: "../acciones/agregar_productos.php", // Reemplaza "agregar_producto.php" con la URL del script que procesa el registro en el servidor
                    data: {
                        nombre: nombre,
                        precio: precio,
                        categoria: categoria
                    },
                    success: function(response) {
                        // Si el registro se realiza correctamente, actualizamos la tabla con el nuevo producto
                        $("#TablaTodosProductos tbody").append(response);

                        // Cerramos la ventana modal
                        $("#AgregarProductos").modal("hide");

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
            $('#TablaTodosProductos').DataTable({
                language: espanol
            });
        });

        window.addEventListener('load', function () {
            var loader = document.getElementById('loader');
            loader.style.display = 'none';
        });
    </script>
    <!-- FIN SCRIPT PARA REGISTRO DE PRODUCTOS-->

</body>

</html>