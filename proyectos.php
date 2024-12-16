<?php
session_start(); // Iniciar la sesión

// Comprobar si el usuario ha iniciado sesión
$usuario_logueado = isset($_SESSION['nombre']); // Suponiendo que guardas el nombre del usuario en la sesión
$nombre_usuario = $usuario_logueado ? $_SESSION['nombre'] : 'Inicia sesión / Regístrate';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos | LUCHIN</title>
    <link rel="icon" href="Imagenes/logomuebles2.png">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <!-- Header con logo y navegación -->
    <header class="header">
        <div class="container">
            <div class="logo">
                <a href="index.html" style="text-decoration: none; color: inherit;">
                    <img src="Imagenes/logomuebles2.png" alt="Logo LUCHIN">
                    <h1>LUCHIN</h1>
                    <p>De todo para su casa</p>
                </a>
            </div>            
            <nav class="navigation">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="tienda/tienda.php">Tienda</a></li>
                    <li><a href="nosotros.php">Nosotros</a></li>
                    <li><a href="proyectos.php">Proyectos</a></li>
                    <li><a href="contacto.php">Contacto</a></li>
                </ul>
            </nav>
            <div class="user-options">
                <?php if ($usuario_logueado): ?>
                    <div class="dropdown">
                        <button id="user-btn"><?= $nombre_usuario; ?></button>
                        <div class="dropdown-content">
                            <a href="logout.php">Cerrar sesión</a>
                        </div>
                    </div>
                <?php else: ?>
                    <button id="login-register-btn">Inicia sesión / Regístrate</button>
                <?php endif; ?>
                <button id="cart-btn" onclick="location.href='cart.php'">Carrito 🛒</button>
            </div>
            <script>
                // Redirige al usuario a la página de inicio de sesión o registro
                document.getElementById('login-register-btn').addEventListener('click', function() {
                    window.location.href = 'login_register.php'; // Cambia a la URL de tu página de inicio de sesión / registro
                });

                // Redirige al usuario a la página del carrito
                document.getElementById('cart-btn').addEventListener('click', function() {
                    window.location.href = 'cart.html'; // Cambia a la URL de tu página del carrito
                });
            </script>
                        
        </div>
    </header>

    <section class="about">
        <h2>LUCHIN ES PROYECTO</h2>
        <div class="history">
            <h3>Historia de LUCHIN</h3>
            <p>LUCHIN, fundada en 2024, es una tienda de muebles ubicada en Jauja, dedicada a ofrecer productos de alta calidad y diseño exclusivo para el hogar. Desde sus inicios, nos hemos comprometido a brindar a nuestros clientes soluciones personalizadas que reflejen su estilo y necesidades. A lo largo de los años, hemos crecido hasta convertirnos en un referente en el sector de la decoración y mobiliario en Perú, destacando por nuestra atención al cliente y productos innovadores.</p>
        </div>

        <div class="about-us">
            <h3>¿Quiénes somos?</h3>
            <p>En LUCHIN, somos un equipo apasionado por el diseño y la funcionalidad en los muebles. Nos especializamos en la fabricación de una amplia gama de productos, desde muebles para salas y comedores hasta accesorios decorativos que complementan cualquier espacio. Nuestro personal está compuesto por profesionales en diseño de interiores, carpintería y atención al cliente, lo que nos permite ofrecer un servicio integral y de alta calidad.</p>
        </div>

        <div class="services">
            <h3>Servicios</h3>
            <ul>
                <li><strong>Diseño Personalizado</strong>: Ofrecemos un servicio de diseño a medida para que cada cliente pueda crear el espacio de sus sueños.</li>
                <li><strong>Mantenimiento de Muebles</strong>: Brindamos un servicio de mantenimiento para asegurar que tus muebles se mantengan en óptimas condiciones a lo largo del tiempo.</li>
                <li><strong>Asesoría en Decoración</strong>: Nuestro equipo está disponible para asesorarte en la elección de muebles y decoración, asegurando que cada pieza encaje perfectamente en tu hogar.</li>
            </ul>
        </div>
            
    <div class="slider">
        <ul>
            <li><img src="Imagenes/mesasala.jpg" alt="Imagen 1"></li>
            <li><img src="Imagenes/2.jpg" alt="Imagen 2"></li>
            <li><img src="Imagenes/4.jpg" alt="Imagen 3"></li>
            <li><img src="Imagenes/sala.jpg" alt="Imagen 4"></li>
        </ul>
        <div class="controls">
            <button class="prev">❮</button>
            <button class="next">❯</button>
        </div>
    </div>
        <div class="projects">
            <h3>Proyectos</h3>
            <p>Contamos con un departamento especializado en proyectos que ofrece asesoría para diseñar y ejecutar proyectos de mobiliario a gran escala, tanto para hogares como para empresas. Cada proyecto es único y adaptado a las necesidades específicas de nuestros clientes, siempre con un enfoque en la calidad y el detalle.</p>
        </div>

        <div class="contact">
            <h3>Contáctanos</h3>
            <p>Para más información, visítanos en <a href="http://www.luchin.com" target="_blank">www.luchin.com</a></p>
            <p><strong>Dirección</strong>: Jauja, Junín</p>
            <p><strong>Teléfono</strong>: +51 994 000 627</p>
            <p><strong>E-mail</strong>: tiendaluchin@gmail.com</p>
            <p><strong>Horario de atención</strong>: Lun – Vie 9am a 6pm | Sáb: 9am-1pm</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Muebles LUCHIN. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
<style>
            .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
</style>