<!-- SE GENERAN Y SE GUARDAN LAS NUEVAS FACTURAS -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>
</head>

<body>
    <?php
    // guardar_factura.php

    // Verificar si se recibió una solicitud POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Incluir el archivo de conexión a la base de datos
        include "../conexion.php";

        // Obtener los datos enviados desde el formulario
        $idCliente = $_POST['cliente'];
        $productos = json_decode($_POST['productos'], true);
        $totalFactura = $_POST['total2'];
        $totalFormateado = number_format($totalFactura, 2, '.', ',');


        /* clientes::: */

        $sqlCliente = "SELECT nombre FROM clientes WHERE id = '$idCliente'";
        $resultCliente = mysqli_query($conexion, $sqlCliente);
        $rowCliente = mysqli_fetch_assoc($resultCliente);
        $nombre_Cliente = $rowCliente['nombre'];

        // Verificar que se hayan enviado los datos necesarios
        if (empty($idCliente) || empty($productos) || empty($totalFactura)) {
            die('Error: Datos incompletos. Asegúrate de ingresar todos los datos necesarios.');
        }

        // Obtener la fecha actual como fecha de emisión de la factura
        date_default_timezone_set('America/Bogota');
        $fechaEmision = date('Y-m-d H:i:s');
        $fechaGuardarArchivo = date('Y_m_d');
        $fechaFactura = date('d/m/Y');
        /* $fechaEmision = date('Y-m-d'); */

        // Realizar la inserción en la tabla 'facturas'
        $sqlInsertFactura = "INSERT INTO facturas (fecha_emision, id_cliente) VALUES ('$fechaEmision', '$idCliente')";
        $resultInsertFactura = mysqli_query($conexion, $sqlInsertFactura);

        if (!$resultInsertFactura) {
            die('Error al guardar la factura en la base de datos.');
        }

        // Obtener el ID de la factura recién insertada
        $facturaId = mysqli_insert_id($conexion);

        foreach ($productos as $detalle) {
            $producto_id = $detalle['producto_id'];
            $cantidad = $detalle['cantidad'];
            $precio_unitario = $detalle['precio_unitario'];
            $total = $detalle['total'];

            // Insertar el detalle en detalles_factura, incluyendo el ID del producto seleccionado
            $sqlDetalle = "INSERT INTO detalles_factura (factura_id, producto_id, cantidad, precio_unitario, total) VALUES ('$facturaId', '$producto_id', '$cantidad', '$precio_unitario', '$total')";
            $resultadoDetalle = mysqli_query($conexion, $sqlDetalle);
        }

        $nit_empresa = "98642678-4";

        // Generar el contenido del PDF con los detalles de la factura
        require_once('../TCPDF-main/tcpdf.php');

        // Crear un nuevo objeto TCPDF
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

        // Agregar una página al PDF
        $pdf->AddPage();

        // Estilos y colores para el PDF
        $pdf->SetFont('helvetica', '', 12);
        $pdf->SetFillColor(255, 255, 255); // Color de fondo para las celdas
        $pdf->SetTextColor(0, 0, 0); // Color de texto

        // Encabezado del PDF
        // Logo de la empresa (modifica la ruta de la imagen según tu ubicación)
        $pdf->Image('../img/logo2.jpeg', 10, 10, 55);
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->Cell(0, 15, 'Cuenta de cobro', 0, 1, 'R', 0, '', 1);

        // Fecha, NIT y Régimen Simplificado
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Fecha emisión: ' . $fechaFactura, 0, 1, 'L', 0);
        $pdf->Cell(0, 10, 'NIT: ' . $nit_empresa, 0, 1, 'L', 0);
        $pdf->Cell(0, 10, 'Régimen Simplificado', 0, 1, 'L', 0);
        // Nombre del cliente
        $pdf->Cell(0, 10, 'Cliente: ' . $nombre_Cliente, 0, 1, 'L', 0);
        $pdf->Ln(5);

        // Detalles de los Productos en una tabla
        /*        $pdf->Cell(0, 10, 'Detalles de los Productos:', 0, 1, 'L', 1);
        $pdf->Ln(3); */

        // Establecer estilos para la tabla
        $pdf->SetFillColor(255);
        $pdf->SetTextColor(0);

        // Encabezado de la tabla
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(80, 10, 'Producto', 1, 0, 'C', 1);
        $pdf->Cell(36, 10, 'Cantidad', 1, 0, 'C', 1);
        $pdf->Cell(40, 10, 'Precio Unitario', 1, 0, 'C', 1);
        $pdf->Cell(35, 10, 'Total', 1, 1, 'C', 1);

        $pdf->SetFont('helvetica', '', 12); // Volver a la fuente normal para los datos de la tabla

        // Llenar la tabla con los detalles de los productos
        foreach ($productos as $detalle) {
            $producto_id = $detalle['producto_id'];
            $cantidad = $detalle['cantidad'];
            $precio_unitario = $detalle['precio_unitario'];
            $total = $detalle['total'];

            // Obtener el nombre del producto desde la base de datos
            $sqlProducto = "SELECT nombre_producto FROM productos WHERE id = '$producto_id'";
            $resultProducto = mysqli_query($conexion, $sqlProducto);
            $rowProducto = mysqli_fetch_assoc($resultProducto);
            $nombre_producto = $rowProducto['nombre_producto'];

            // Mostrar los detalles en la tabla
            $pdf->Cell(80, 10, $nombre_producto, 1, 0, 'L', 1);
            $pdf->Cell(36, 10, $cantidad, 1, 0, 'C', 1);
            $pdf->Cell(40, 10, $precio_unitario, 1, 0, 'C', 1);
            $pdf->Cell(35, 10, $total, 1, 1, 'C', 1);

            // Verificar si se necesita una nueva página para más detalles de productos
            if ($pdf->getY() > 300) { // 130 es un valor aproximado para ajustar según tus necesidades
                $pdf->AddPage();
                $pdf->Ln(10);
                // Agregar nuevamente el encabezado de la tabla en la nueva página
                $pdf->SetFont('helvetica', 'B', 12);
                $pdf->Cell(80, 10, 'Producto', 1, 0, 'C', 1);
                $pdf->Cell(36, 10, 'Cantidad', 1, 0, 'C', 1);
                $pdf->Cell(40, 10, 'Precio Unitario', 1, 0, 'C', 1);
                $pdf->Cell(35, 10, 'Total', 1, 1, 'C', 1);

                $pdf->SetFont('helvetica', '', 12);  // Volver a la fuente normal para los datos de la tabla
            }
        }
        $pdf->SetFont('helvetica', 'B', 12); // Establecer la fuente en negrita para el total
        $pdf->Cell(0, 15, 'Total Factura: ' . '$' . $totalFormateado, 0, 1, 'R', 0, '', 1);
        $pdf->SetFont('helvetica', '', 12); // Volver a la fuente normal para los detalles de la tabla

        // Mostrar un pequeño párrafo en letra negrita y cursiva
        $pdf->SetFont('helvetica', 'BI', 12);
        $pdf->Cell(0, 10, '¡Gracias por su compra, nos complace atenderlo!', 0, 1, 'L', 0, '', 1);
        $pdf->SetFont('helvetica', '', 12); // Volver a la fuente normal para el resto del contenido

        // Nombre y ruta del archivo PDF
        $file_name = 'FTR_' . $facturaId . '_' . $nombre_Cliente . '.pdf';
        $pdf_path = 'C:/xampp/htdocs/FolderProyectos/TorniJonhs/PDFS/' . $file_name;

        // Guardar el PDF en la carpeta especificada
        $pdf->Output($pdf_path, 'F');

        // La factura y el PDF se han generado correctamente
        echo "<script>
    Swal.fire({
        icon: 'success',
        title: '¡Factura guardada exitosamente!',
        showConfirmButton: false,
        timer: 2000
    }).then(() => {
        window.location.href = '../vistas/facturacion.php';
    });
</script>";

        /*    echo "correcto"; */

        // Puedes agregar aquí código adicional o redireccionar a otra página
        // header('Location: otra_pagina.php');
        // exit();
    }
    ?>