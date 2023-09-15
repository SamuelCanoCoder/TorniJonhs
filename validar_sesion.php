<?php
session_start();

// Comprobar si la variable de sesión "usuario" no está establecida o está vacía
if (!isset($_SESSION["usuario"]) || empty($_SESSION["usuario"])) {
    // Redirigir al index
    header("Location: index.php");
    exit(); // Terminar la ejecución del script para evitar que se siga mostrando el contenido de la vista
}
?>