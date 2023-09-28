<?php
include "conexion.php";
include "validar_sesion.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./Style/estilosInicio.css">
    <link rel="shortcut icon" href="img/Favicon.ico" type="image/x-icon">
    <title>TorniJonhs</title>
</head>

<body>

    <!-- PANTALLA DE CARGA:: -->
    <div id="loader">
        <img src="img/Cargando.gif" alt="Indicador de carga">
    </div>

    <!-- Menú lateral -->
    <div class="sidebar">
        <a href="vistas/productos.php" class="menu-link"><i class="fa-solid fa-boxes-stacked"></i> Productos</a>
        <a href="vistas/facturacion.php" class="menu-link"><i class="fa-solid fa-list-check"></i> Facturación</a>
        <a href="vistas/clientes.php" class="menu-link"><i class="fa-solid fa-people-group"></i> Clientes</a>
        <a href="vistas/facturas.php" class="menu-link"><i class="fa-solid fa-folder-open"></i> Facturas</a>
        <a href="cerrarSesion.php" name="btncerrar"><i class="fa-solid fa-right-from-bracket"></i> <strong> Cerrar Sesión</strong></a>

    </div>

    <!-- Contenido principal -->
    <div class="content" id="contenido">
        <!-- Aquí se mostrará el contenido dinámico -->
    </div>


    <script>
        /* PANTALLA DE CARGA: */

        window.addEventListener('load', function() {
            var loader = document.getElementById('loader');
            loader.style.display = 'none';
        });
    </script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>


</body>

</html>