<!-- SE GENERAN Y SE GUARDAN LAS NUEVAS FACTURAS EDITADAS -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>
</head>

<body>
    <?php
    include "../conexion.php";
    $productosLista = json_decode($_POST['productosLista'], true);

    /* SE VALIDA SI LA LISTA DE REGISTROS NO ESTA VACIA, SI ESTA VACIA LA FACTURA NO SE DEBERIA PROCESAR */
    if (!empty($productosLista)) {
        // La lista de productos no está vacía::
        $idFactura = $_POST['id_factura'];
        $idCliente = $_POST['cliente'];
        $totalFinal = $_POST['total2'];
        $clienteAnterior = $_POST['clienteAnterior'];
        $totalFormateado = number_format($totalFinal, 2, '.', ',');

        // Obtener la fecha actual como fecha de emisión de la factura
        date_default_timezone_set('America/Bogota');
        $fechaEmision = date('Y-m-d H:i:s');
        $fechaGuardarArchivo = date('Y_m_d');
        $fechaFactura = date('d/m/Y');

        /* CLIENTES::::: */

        $sqlCliente = "SELECT * FROM clientes WHERE id = '$idCliente'";
        $resultCliente = mysqli_query($conexion, $sqlCliente);
        $rowCliente = mysqli_fetch_assoc($resultCliente);
        $nombre_Cliente = $rowCliente['nombre'];
        $telefono_Cliente = $rowCliente['telefono'];
        $direccion_Cliente = $rowCliente['direccion'];

        // Actualizar los datos de la factura en la base de datos
        mysqli_query($conexion, "UPDATE facturas SET fecha_emision = '$fechaEmision', id_cliente = $idCliente WHERE id = $idFactura");

        // Eliminar los detalles de productos anteriores asociados a la factura
        mysqli_query($conexion, "DELETE FROM detalles_factura WHERE factura_id = $idFactura");

        // Insertar los nuevos detalles de productos asociados a la factura
        foreach ($productosLista as $producto) {
            $productoId = $producto['producto_id'];
            $cantidad = $producto['cantidad'];
            $precioUnitario = $producto['precio_unitario'];
            $total = $producto['total'];
            /* Registrar actualizaciones:: */
            mysqli_query($conexion, "INSERT INTO detalles_factura (factura_id, producto_id, cantidad, precio_unitario, total) 
                                                    VALUES ($idFactura, '$productoId', $cantidad, $precioUnitario, $total)");
        }

        // Ruta al archivo PDF existente
        $rutaPDFExistente = '../PDFS/' . 'FTR_' . $idFactura . '_' . $clienteAnterior . '.pdf';
        /* echo $rutaPDFExistente; */
        // Eliminar el archivo PDF existente
        if (file_exists($rutaPDFExistente)) {
            unlink($rutaPDFExistente);
        }

        /* GENERACION DEL NUEVO PDF::: */
        $nit_empresa = "98642678-4";

        // Generar el contenido del PDF con los detalles de la factura
        require_once('../TCPDF-main/tcpdf.php');

        $pdf = new TCPDF('P', 'mm', 'Letter');
        $pdf->SetMargins(17, 17, 17);
        $pdf->AddPage();

        # Logo de la empresa formato png #
        $pdf->Image('../img/Logo2Blanco.png', 155, 13, 40, 35, 'PNG');

        # Encabezado y datos de la empresa #
        /* $pdf->SetFont('helvetica','B',16);
        $pdf->SetTextColor(32,100,210);
        $pdf->Cell(150,10,(strtoupper("TorniJohn's")),0,0,'L');
    
        $pdf->Ln(9);
     */
        $pdf->SetFont('helvetica', '', 10);
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(150, 9, ("NIT: " . $nit_empresa), 0, 0, 'L');


        $pdf->Ln(5);

        $pdf->Cell(150, 9, ("Teléfono: 314 6169908"), 0, 0, 'L');

        $pdf->Ln(5);

        $pdf->Cell(150, 9, ("Email: Jecociro@hotmail.com"), 0, 0, 'L');

        $pdf->Ln(10);

        $pdf->SetFont('helvetica', '', 10);
        $pdf->Cell(30, 7, ("Fecha de emisión:"), 0, 0);
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(116, 7, ($fechaEmision));
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(35, 7, (strtoupper("FTR" . $idFactura)), 0, 0, 'C');

        $pdf->Ln(10);

        $pdf->SetFont('helvetica', '', 10);
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(13, 7, ("Cliente: "), 0, 0);
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(60, 7, ($nombre_Cliente), 0, 0, 'L');
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(8, 7, ("Doc: "), 0, 0, 'L');
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(60, 7, ($idCliente), 0, 0, 'L');
        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(7, 7, ("Tel: "), 0, 0, 'L');
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(35, 7, ($telefono_Cliente), 0, 0);
        $pdf->SetTextColor(39, 39, 51);

        $pdf->Ln(7);

        $pdf->SetTextColor(39, 39, 51);
        $pdf->Cell(6, 7, ("Dir: "), 0, 0);
        $pdf->SetTextColor(97, 97, 97);
        $pdf->Cell(109, 7, ($direccion_Cliente), 0, 0);

        $pdf->Ln(10);

        #Tabla de productos #
        $pdf->SetFont('helvetica', '', 11);
        $pdf->SetFillColor(23, 83, 201);
        $pdf->SetDrawColor(23, 83, 201);
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(82, 8, ("Producto"), 1, 0, 'C', true);
        $pdf->Cell(30, 8, ("Cantidad"), 1, 0, 'C', true);
        $pdf->Cell(35, 8, ("Precio Unitario"), 1, 0, 'C', true);
        $pdf->Cell(30, 8, ("Total"), 1, 0, 'C', true);

        $pdf->Ln(8);

        $pdf->SetTextColor(39, 39, 51);

        foreach ($productosLista as $detalle) {
            $producto_id = $detalle['producto_id'];
            $cantidad = $detalle['cantidad'];
            $precio_unitario = $detalle['precio_unitario'];
            $total = $detalle['total'];

            // Obtener el nombre del producto desde la base de datos
            $sqlProducto = "SELECT nombre_producto FROM productos WHERE id = '$producto_id'";
            $resultProducto = mysqli_query($conexion, $sqlProducto);
            $rowProducto = mysqli_fetch_assoc($resultProducto);
            $nombre_producto = $rowProducto['nombre_producto'];

            $startY = $pdf->GetY();

            $pdf->Cell(82, 7, ($nombre_producto), 'L', 0, 'C');
            $pdf->Cell(30, 7, ($cantidad), 'L', 0, 'C');
            $pdf->Cell(35, 7, ($precio_unitario), 'L', 0, 'C');
            $pdf->Cell(30, 7, ($total), 'LR', 0, 'C');
            $pdf->Line(17, $startY + 7, 194, $startY + 7);

            $pdf->Ln(7);
            // Verificar si se necesita una nueva página para más detalles de productos
            if ($pdf->getY() > 300) { // 130 es un valor aproximado para ajustar según tus necesidades
                $pdf->AddPage();
                $pdf->Ln(10);
                // Agregar nuevamente el encabezado de la tabla en la nueva página
                $pdf->SetFont('helvetica', '', 11);
                $pdf->SetFillColor(23, 83, 201);
                $pdf->SetDrawColor(23, 83, 201);
                $pdf->SetTextColor(255, 255, 255);
                $pdf->Cell(82, 8, ("Producto"), 1, 0, 'C', true);
                $pdf->Cell(30, 8, ("Cantidad"), 1, 0, 'C', true);
                $pdf->Cell(35, 8, ("Precio Unitario"), 1, 0, 'C', true);
                $pdf->Cell(30, 8, ("Total."), 1, 0, 'C', true);
                $pdf->SetFont('helvetica', '', 11);  // Volver a la fuente normal para los datos de la tabla
            }
        }


        $pdf->SetFont('helvetica', 'B', 10);

        $pdf->Ln(7);

        $pdf->Cell(100, 7, (''), '', 0, 'C');
        $pdf->Cell(10, 7, (''), '', 0, 'C');


        $pdf->Cell(32, 7, ("TOTAL A PAGAR "), 'T', 0, 'C');
        $pdf->Cell(34, 7, ("$" . $totalFormateado . " COP"), 'T', 1, 'C');

        // Obtener la altura actual del contenido
        $currentY = $pdf->GetY();

        $totalContentHeight = $currentY;

        $requiredHeight = 20; // Altura necesaria para el mensaje

        // Calcula la posición Y para que el mensaje esté en la parte inferior
        $bottomY = $pdf->getPageHeight() - $requiredHeight - 10; // Margen inferior de 10

        // Si la altura total del contenido actual es menor que el espacio necesario
        if ($totalContentHeight < $bottomY) {
            $bottomY = $totalContentHeight + 5; // Agregar un pequeño margen
        }

        // Establece la posición Y para dibujar el mensaje en la parte inferior
        $pdf->SetY($bottomY);

        $pdf->SetFont('helvetica', 'BI', 10);
        $pdf->Cell(0, 9, '¡Gracias por permitirnos crecer con usted!', 0, 1, 'C', 0, '', 1);
        $pdf->SetFont('helvetica', '', 12); // Volver a la fuente normal para el resto del contenido

        // Nombre y ruta del archivo PDF
        $file_name = 'FTR_' . $idFactura . '_' . $nombre_Cliente . '.pdf';
        $pdf_path = 'C:/xampp/htdocs/TorniJonhs/PDFS/' . $file_name;

        // Guardar el PDF en la carpeta especificada
        $pdf->Output($pdf_path, 'F');

        echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: '¡Factura guardada exitosamente!',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    window.location.href = '../vistas/facturas.php';
                });
            </script>";

    } else {

        echo "<script>
    Swal.fire({
        icon: 'error',
        title: '¡Error al guardar la factura!',
        text: 'La factura no puede quedar vacía, debe contener al menos un registro',
        showConfirmButton: false,
        timer: 4000
    }).then(() => {
        window.location.href = '../vistas/facturas.php';
    });
    </script>";
    }

    ?>
</body>

</html>