<?php
include "conexion.php";
include "validar_sesion.php";
?>

<!-- Agregar SweetAlert -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.17/dist/sweetalert2.min.js"></script>
<script>
    // Función para mostrar el SweetAlert
    function mostrarSweetAlert() {
        Swal.fire({
            title: 'Cerrar Sesión',
            text: '¿Estás seguro de que quieres cerrar sesión?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, cerrar sesión',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Cerrando sesión...',
                    showConfirmButton: false,
                    timer: 1100
                })
                setTimeout(function() {
                    window.location.href = 'destruirSesion.php';
                }, 1300);
            } else {
                window.history.go(-1)
            }
        });
    }

    // Llamar a la función al cargar la página
    window.onload = function() {
        mostrarSweetAlert();
    };
</script>