<?php
// editarFactura.php
include "../conexion.php";
// Verificar si se recibió el "id"
if (isset($_GET['id'])) {
    // Obtener el ID de la factura desde el parámetro GET
    $idFactura = $_GET['id'];

    // Consulta para obtener de clientes desde la base de datosy saber cual PDF se eliminará
    $sqlClientes = "SELECT * FROM facturas INNER JOIN clientes ON facturas.id_cliente = clientes.id WHERE facturas.id = $idFactura;";
    $resultadoClientes = mysqli_query($conexion, $sqlClientes);
    $filas = mysqli_fetch_assoc($resultadoClientes);
    $clienteActual = $filas['nombre'];

    /* SE CONSULTA EL ID CLIENTE ACTUAL */    
    $consultaFactura = mysqli_query($conexion, "SELECT * FROM facturas WHERE id = $idFactura;");
    $resultadoCliente = mysqli_fetch_assoc($consultaFactura);
    $idclienteActual = $resultadoCliente['id_cliente'];

    // Obtener los detalles de los productos asociados a la factura
    $consultaDetalles = mysqli_query($conexion, "SELECT * FROM detalles_factura INNER JOIN productos ON detalles_factura.producto_id = productos.id WHERE factura_id = $idFactura");
    $detallesProductos = array();
    while ($detalle = mysqli_fetch_assoc($consultaDetalles)) {
        $detallesProductos[] = $detalle;
    }
}
/* CALCULAR EL TOTAL DE LA FACTURA */
$sqlTotalBD = "SELECT SUM(total) AS suma_total FROM detalles_factura WHERE factura_id = $idFactura";
$resultadoTotalBD = mysqli_query($conexion, $sqlTotalBD);
$fila = mysqli_fetch_assoc($resultadoTotalBD);
$sumaTotal = $fila['suma_total'];

// Procesar el formulario al enviarlo para actualizar la información en la base de datos
/* if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados desde el formulario (puedes hacer la validación necesaria)
    $idFactura = $_POST['id_factura'];
    $fechaEmision = $_POST['fecha_emision'];
    $idCliente = $_POST['cliente'];
    // Obtener detalles de productos enviados desde el formulario (puedes hacer la validación necesaria)
    $productos = $_POST['productos'];

    // Actualizar los datos de la factura en la base de datos
    mysqli_query($conexion, "UPDATE facturas SET fecha_emision = '$fechaEmision', id_cliente = $idCliente WHERE id = $idFactura");

    // Eliminar los detalles de productos anteriores asociados a la factura
    mysqli_query($conexion, "DELETE FROM detalles_factura WHERE id_factura = $idFactura");

    // Insertar los nuevos detalles de productos asociados a la factura
    foreach ($productos as $producto) {
        $productoId = $producto['producto_id'];
        $cantidad = $producto['cantidad'];
        $precioUnitario = $producto['precio_unitario'];
        $total = $producto['total'];
        mysqli_query($conexion, "INSERT INTO detalles_factura (id_factura, producto_id, cantidad, precio_unitario, total) VALUES ($idFactura, '$productoId', $cantidad, $precioUnitario, $total)");
    }


} */

?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<!-- Incluye el archivo JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../Style/estilosInicio.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="sidebar">
        <a href="../vistas/facturas.php" class="menu-link"><i class="fa-solid fa-circle-left"></i> Volver</a>
        <a href="cerrarSesion.php" name="btncerrar"><i class="fa-solid fa-right-from-bracket"></i> <strong> Cerrar Sesión</strong></a>

    </div>

    <div class="content p-5" id="contenido">
        <h2 class="text-center"><strong>Editar Factura</strong></h2>
        <br>
        <form id="formularioFactura" class="form-control p-5" action="guardarCambiosEditar.php" method="post">
               
            <!-- Agrega un campo oculto para enviar el ID de la factura al procesar el formulario -->
            <input type="hidden" name="id_factura" value="<?php echo $idFactura; ?>">
            
        <!--NOMBRE DEL CLIENTE ACTUAL REGISTRADO EN LA FACTURA POR SI LO CAMBIA AUN ASI TENERLO Y SABER CUAL PDF BORRAR:  -->
            <input type="hidden" name="clienteAnterior" class="form-control" id="clienteAnterior" value="<?php echo $clienteActual;?>"required readonly>
              

            <label for="cliente" class="label-form">Cliente:</label>
            <select name="cliente" class="form-control" id="cliente" required>
                <?php
                // Consulta para obtener la lista de clientes desde la base de datos
                $sqlClientes = "SELECT id, nombre FROM clientes";
                $resultadoClientes = mysqli_query($conexion, $sqlClientes);

                while ($cliente = mysqli_fetch_assoc($resultadoClientes)) {
                    // Verificar si el cliente actual coincide con el cliente registrado en la factura
                    $selected = ($cliente['id'] == $idclienteActual) ? 'selected' : '';
                    echo '<option value="' . $cliente['id'] . '" ' . $selected . '>' . $cliente['nombre'] . '</option>';
                }
                ?>
            </select>

            <br>
            <?php
            ?>

            <label for="producto" class="label-form">Producto:</label>
            <input type="text" class="form-control" name="producto" id="producto" placeholder="Busca aquí...">
            <br>

            <label for="Precio" class="label-form">Precio:</label>
            <input type="number" class="form-control" name="Precio" id="Precio">
            <br>

            <label for="cantidad" class="label-form">Cantidad:</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad">
            <br>

            <label for="total" class="label-form">Total Unitario:</label>
            <input type="number" class="form-control" name="total" id="total" readonly>

            <br>
            <input type="button" class="btn btn-primary" value="Agregar Producto" onclick="agregarProducto()">
            <br><br>

            <label for="total" class="label-form">Total final:</label>
            <input type="number" class="form-control" name="total2" id="total2" value="<?php echo $sumaTotal; ?>" readonly>
            <br><br>


            <!-- CAMPO PA GUARDAR EL ID ANTES DE AGREGARLO A LA TBALA -->
            <input type="hidden" name="productosid" id="productosid" value="">

            <!-- Campo oculto para enviar los detalles de los productos -->
            <input type="hidden" name="productosLista" id="productosLista" value="">


            <!-- Aquí se mostrarán los productos agregados a la factura -->
            <div id="productosAgregados">
                <table class="table" id="registrados">
                    <thead>
                        <tr>
                            <th>ID Producto</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($detallesProductos as $detalle) { ?>
                            <tr>
                                <td><?php echo $detalle['producto_id'] ?></td>
                                <td><?php echo $detalle['nombre_producto'] ?></td>
                                <td><?php echo $detalle['precio_unitario']; ?></td>
                                <td><?php echo $detalle['cantidad']; ?></td>
                                <td><?php echo $detalle['total']; ?></td>
                                <td><button type="button" class="btn btn-danger btn-eliminar">Eliminar</button></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <!-- <script src="../js/idiomaTablas.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#registrados').DataTable({
                            language: espanol
                        });
                    });
                </script> -->
            </div>

            <br>
            <input type="submit" class="btn btn-success" value="Guardar Cambios">
        </form>
    </div>
</body>

</html>

<script>
    $(document).ready(function() {

        /* OBTENER EL PRECIO DEL PRODUCTO SELECCIONADO:: */
        function obtenerPrecio(producto) {

            $.ajax({

                url: "obtenerPrecioProducto.php",
                method: "POST",
                data: {
                    producto: producto
                },
                dataType: "json",
                success: function(data) {
                    // Asignar el precio al campo de Precio
                    $("#Precio").val(data.precio);

                },
                error: function() {
                    alert("Error al obtener el precio del producto.");
                }
            });
        }


        // Autocompletar del campo #producto
        $("#producto").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "buscarProductos.php",
                    method: "POST",
                    data: {
                        consulta: request.term
                    },
                    dataType: "json",
                    success: function(data) {
                        var opciones = data.map(function(producto) {
                            return {
                                label: producto.nombre,
                                value: producto.nombre,
                                id: producto.id // Agregar el ID del producto como propiedad "id" en el objeto de opciones
                            };

                        });
                        response(opciones);

                    },
                    error: function() {
                        alert("Error al buscar productos.");
                    }
                });
            },
            minLength: 2,
            // Evento select para mostrar el precio del producto seleccionado en el campo de Precio
            select: function(event, ui) {
                // Asignar el valor del campo #productosid con el ID del producto seleccionado
                $("#productosid").val(ui.item.id);

                obtenerPrecio(ui.item.value);
            }
        });

        // Evento change del input #producto para actualizar el precio al escribir un producto manualmente
        $("#producto").on("change", function() {
            var productoIngresado = $(this).val();
            if (productoIngresado !== "") {
                // Hacer una nueva petición AJAX para obtener el precio del producto ingresado
                obtenerPrecio(productoIngresado);
            } else {
                // Limpiar el campo de Precio si no se ingresó ningún producto
                $("#Precio").val("");
            }
        });


        $("#cantidad").on("change", function() {
            var cantidad = $(this).val();
            var cantidad2 = parseFloat($(this).val());
            var precioIngresado = $("#Precio").val();
            var precioIngresado2 = parseFloat(precioIngresado); // Convertir el precio a número decimal
            /*  console.log(precioIngresado);
             console.log(precioIngresado2);
             console.log(cantidad);
             console.log(cantidad2); */
            if (cantidad !== "") {
                var resultado = cantidad2 * precioIngresado2;
                /* console.log(resultado); */
                $("#total").val(resultado);
            } else {
                $("#total").val("");
            }

        });
        
        /* PARA GUARDAR:: */

        $("#formularioFactura").on("submit", function() {
            var detallesProductos = [];
            $("#productosAgregados table tbody tr").each(function() {
                var producto = $(this).find("td:eq(0)").text();
                var precio = parseFloat($(this).find("td:eq(2)").text());
                var cantidad = parseInt($(this).find("td:eq(3)").text());
                var total = parseFloat($(this).find("td:eq(4)").text());

                detallesProductos.push({
                    producto_id: producto,
                    cantidad: cantidad,
                    precio_unitario: precio,
                    total: total
                });
            });

            // Convertir los detalles de los productos a formato JSON y asignar al campo oculto
            $("#productosLista").val(JSON.stringify(detallesProductos));
        });


        // Delegar eventos de clic en el botón de eliminar
        $("#productosAgregados").on("click", ".btn-eliminar", function() {
            // Resto de la función eliminarFila
        });
    });

    /* FUNCIONES::: */
    $("#productosAgregados").on("click", ".btn-eliminar", function() {
        var fila = $(this).closest("tr");
        /* SE SE OBTIENE LA POSICION DEL TOTAL EN  LA TABLA, ES DECIR LA 4 */
        var totalEliminado = parseFloat(fila.find("td").eq(4).text()); // Obtener el total de la fila antes de eliminarla

        // Eliminar la fila de la tabla
        fila.remove();

        // Actualizar el campo de Total final restando el valor de la fila eliminada
        var totalFinal = parseFloat($("#total2").val() || 0);
        var nuevoTotal2 = totalFinal - totalEliminado;
        $("#total2").val(nuevoTotal2.toFixed(2));

        // Actualizar el Total final llamando a la función
        actualizarTotalFinal();
    });

    // Función para actualizar el campo Total final
    function actualizarTotalFinal() {
        var totalFinal = 0;
        /* SE SE OBTIENE LA POSICION DEL TOTAL EN  LA TABLA, ES DECIR LA 4 */
        $("#productosAgregados table tbody tr").each(function() {
            var totalFila = parseFloat($(this).find("td").eq(4).text());
            totalFinal += totalFila;
        });
        $("#total2").val(totalFinal.toFixed(2));
    }

    /* FUNCION PARA AGREGAR PRODUCTOS A LA TABLA */
    function agregarProducto() {
        var producto = $("#producto").val();
        var precio = parseFloat($("#Precio").val());
        var cantidad = parseInt($("#cantidad").val());
        var idProductoSeleccionado = $("#productosid").val(); // Obtener el ID del producto seleccionado

        if (producto !== "" && !isNaN(precio) && !isNaN(cantidad)) {
            // Crear una nueva fila en la tabla para mostrar el producto agregado
            var fila = '<tr><td>' + idProductoSeleccionado + '</td><td>' + producto + '</td><td>' + precio.toFixed(2) + '</td><td>' + cantidad + '</td><td>' + (precio * cantidad).toFixed(2) + '</td><td><button type="button" class="btn btn-danger btn-eliminar">Eliminar</button></td></tr>';
            $("#productosAgregados table tbody").append(fila);

            // Limpiar los campos de Producto, Precio y Cantidad para agregar otro producto
            $("#producto").val("");
            $("#Precio").val("");
            $("#cantidad").val("");
            $("#total").val("");

            // Actualizar el campo de Total sumando el valor del producto agregado
            var totalUnitario = parseFloat((precio * cantidad).toFixed(2));
            var totalFinal = parseFloat($("#total2").val() || 0); // Si el campo está vacío, considerar 0
            var nuevoTotal = totalFinal + totalUnitario;
            $("#total2").val(nuevoTotal.toFixed(2));
        } else {
            alert("Ingrese un producto válido con su precio y cantidad.");
        }
    }

</script>