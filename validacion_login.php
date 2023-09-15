<?php
session_start();
include "conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>
</head>

<body>
    <?php
    if (!empty($_POST["usuario"]) and !empty($_POST["contrasena"])) {
        /* echo " INGRESO LOS DOS CAMPOS"; */
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        /* echo ($usuario . " " . $contrasena); */
        // Realizar consulta para validar el usuario y contraseña en la base de datos
        $sql = "SELECT * FROM usuarios WHERE correo = '$usuario' AND contrasena = '$contrasena'";
        $resultado = mysqli_query($conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            // Inicio de sesión exitoso
            $_SESSION["usuario"] = $usuario;

            // Mostrar alerta de éxito con SweetAlert
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
    }
    ?>


</body>

</html>

<style>
    /*    .alert-danger{
    margin: 0 auto;
    justify-content: center;
    align-items: center;
    font-size: 14px;
    width: auto;
   } */
</style>