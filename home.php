<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/rellax@1.12.0/rellax.min.js"></script>
    <script src="https://unpkg.com/rolly.js@<VERSION>/dist/rolly.min.js"></script>
    <title>Tienda de Ferretería</title>
</head>
<body>
    <section class="banner">
        <!-- Contenido del banner, como el nombre de la ferretería -->
    </section>

    <section class="menu">
        <!-- Botones de navegación -->
        <ul>
            <li><a href="#">Botón 1</a></li>
            <li><a href="#">Botón 2</a></li>
            <li><a href="#">Botón 3</a></li>
        </ul>
    </section>

    <section class="content">
        <h1>Hola</h1>
        <h1>Hola</h1>
        <h1>Hola</h1>
        <h1>Hola</h1>
        <h1>Hola</h1>
        <h1>Hola</h1>
    </section>

    <!-- Otras secciones de tu tienda virtual -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var rellax = new Rellax('.banner', {
                speed: -2, // Ajusta la velocidad de parallax según tus preferencias
                center: false, // Ajusta si quieres que el banner esté centrado o no
                wrapper: null, // Puedes especificar un contenedor si es necesario
                round: true, // Redondea los valores para evitar subpíxeles (opcional)
            });

            // Muestra el menú de navegación al hacer scroll
            window.addEventListener('scroll', function () {
                // Ajusta el efecto de difuminado
                var blurValue = (window.scrollY / window.innerHeight) * 10; // Ajusta este valor según sea necesario
                document.querySelector('.banner').style.filter = `blur(${blurValue}px)`;

                // Verifica si el menú debe mostrarse o ocultarse
                if (window.scrollY > 0) {
                    document.querySelector('.menu').style.display = 'block';
                } else {
                    document.querySelector('.menu').style.display = 'none';
                }
            });
        });
    </script>

<style>
    /* Estilos generales */
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

/* Estilos del banner */
.banner {
    height: 100vh; /* Establece la altura del banner como el 100% de la altura de la ventana */
    background-image: url('img/Banner.png'); /* Cambia la ruta a tu imagen PNG */
    background-size: cover;
    background-position: center;
    position: relative;
    z-index: 1; /* Asegura que el banner esté en la parte superior */
}

/* Estilos del menú de navegación */
.menu {
    display: none; /* Inicialmente oculto */
    background-color: #F5C116; /* Color de fondo del menú */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 2; /* Por encima del banner */
}

/* Estilos de la lista de botones */
.menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
}

/* Estilos de los botones */
.menu ul li {
   /*  margin-right: 1px; */
}

.menu ul li a {
    align-items: center;
    color: #fff; /* Color de texto */
    text-decoration: none;
    padding: 10px 20px;
    display: inline-block;
    transition: background-color 0.3s ease; /* Transición para el cambio de color */
}

/* Cambio de color al pasar el mouse por encima */
.menu ul li a:hover {
    background-color: #100350; /* Color azul al pasar el mouse */
    color: #fff; /* Cambia el color del texto a blanco */
}

/* Estilos del contenido de la tienda */
.content {
    padding: 100px 20px; /* Ajusta el relleno según tus necesidades */
}
</style>

</body>
</html>
