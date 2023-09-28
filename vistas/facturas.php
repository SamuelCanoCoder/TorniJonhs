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
    <link rel="shortcut icon" href="../img/Favicon.ico" type="image/x-icon">
</head>

<body>

    <!-- PANTALLA DE CARGA:: -->
    <div id="loader">
        <img src="../img/Cargando.gif" alt="Indicador de carga">
    </div>

    <div class="sidebar">
        <a href="../inicio.php" class="menu-link"><i class="fa-solid fa-circle-left"></i> Volver</a>
        <a href="../cerrarSesion.php" name="btncerrar"><i class="fa-solid fa-right-from-bracket"></i> <strong> Cerrar Sesión</strong></a>

    </div>

    <div class="content" id="contenido">

        <h3 class="text-center mt-4"><i class="fa-solid fa-boxes-stacked"> Faturas generadas</i></h3>
        <div id="CajaFacturas" class="mt-5 m-5 p-4">
            <?php
            $consultaFacturas = mysqli_query($conexion, "SELECT facturas.*, clientes.nombre AS nombre_cliente FROM facturas INNER JOIN clientes ON facturas.id_cliente = clientes.id;");
            ?>
            <table id="TablaTodasFacturas">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha emisión</th>
                        <th>Cliente</th>
                        <th style="width: 0 auto;"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($mostrar = mysqli_fetch_array($consultaFacturas)) {

                    ?>
                        <tr>
                            <td><?php echo "FTR_" . $mostrar['id'] ?></td>
                            <td><?php echo $mostrar['fecha_emision'] ?></td>
                            <td><?php echo $mostrar['nombre_cliente'] ?></td>
                            <td><?php echo '<a href="../acciones/editarFactura.php?id=' . $mostrar['id'] . '" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>' . ' ' .
                                    '<a href="../PDFS/FTR_' . $mostrar['id'] . '_' . $mostrar['nombre_cliente'] . '.pdf' . '" class="btn btn-success" download><i class="fa-solid fa-download"></i></a>' ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>

        <script src="../js/idiomaTablas.js"></script>
        <script>
            $(document).ready(function() {
                $('#TablaTodasFacturas').DataTable({
                    language: espanol
                });
            });

            window.addEventListener('load', function() {
                var loader = document.getElementById('loader');
                loader.style.display = 'none';
            });
        </script>
    </div>
</body>

</html>