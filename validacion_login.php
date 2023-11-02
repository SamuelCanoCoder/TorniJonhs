<?php
session_start();
include "conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Título de tu página</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>
</head>

<body>
    <?php
    if (!empty($_POST["usuario"]) && !empty($_POST["contrasena"])) {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        // Utiliza sentencias parametrizadas para evitar inyección SQL
        $sql = "SELECT * FROM usuarios WHERE correo = ? AND contrasena = ?";
        $stmt = mysqli_prepare($conexion, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $usuario, $contrasena);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0) {
                // Inicio de sesión exitoso
                $_SESSION["usuario"] = $usuario;

                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Inicio de sesión exitoso',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    window.location.href = 'inicio.php';
                });
                </script>";
            } else {
                // Usuario o contraseña incorrectos
                echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Usuario o contraseña incorrectos',
                    showConfirmButton: false,
                    timer: 2200
                }).then(() => {
                    window.location.href = 'index.php';
                });
                </script>";
            }

            mysqli_stmt_close($stmt);
        } else {
            // Error en la preparación de la consulta
            echo "Error en la consulta";
        }
    }
    ?>

</body>

</html>
