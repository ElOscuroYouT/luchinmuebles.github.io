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
    <title>Nosotros | LUCHIN</title>
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
    <!-- Sección Nosotros -->
    <section id="about-us">
        <div class="container">
            <div class="about-us-text">
                <h2>MUEBLES LUCHIN es sinónimo de calidad y larga duración</h2>
                <h3>¿QUIÉNES SOMOS?</h3>
                <p>Somos una empresa especializada en la fabricación y venta de muebles de alta calidad. Fundada en 2024 en Jauja, Muebles LUCHIN ha crecido rápidamente gracias a nuestra dedicación a ofrecer productos exclusivos y duraderos. Nos enorgullece proporcionar soluciones de mobiliario que combinan estilo, confort y funcionalidad.</p>
                <h3>SHOWROOM</h3>
                <p>Contamos con un amplio showroom en Jauja, donde podrás encontrar una gran variedad de muebles diseñados para salas, comedores, dormitorios, oficinas, y más. Ven a visitarnos y descubre el mobiliario ideal para tu hogar o negocio.</p>
            </div>
            <div class="about-us-image">
                <img src="Imagenes/4.jpg" alt="Fachada de Muebles LUCHIN">
            </div>
        </div>
    </section>

    <!-- Sección Visión, Misión y Valores -->
    <section id="vision-mission">
        <div class="container">
            <div class="vision-mission-text">
                <h3>VISIÓN</h3>
                <p>Impulsar nuestra marca a nivel nacional y global, siendo reconocidos por la calidad y diseño de nuestros muebles.</p>
                <h3>MISIÓN</h3>
                <p>Satisfacer las necesidades de nuestros clientes a través de la fabricación de muebles funcionales y de alta calidad, generando empleo y contribuyendo al desarrollo de nuestra comunidad.</p>
                <h3>COMPROMISO</h3>
                <p>Trabajamos con pasión y dedicación para brindar un servicio personalizado y profesional, cumpliendo con los más altos estándares de calidad en cada pieza que fabricamos.</p>
                <h3>VALORES</h3>
                <p>Responsabilidad, compromiso, trabajo en equipo, pasión, impulso y excelencia.</p>
            </div>
            <div class="vision-mission-image">
                <img src="Imagenes/1.jpg" alt="Persona diseñando muebles en tablet">
            </div>
        </div>
    </section>

    <!-- Footer -->
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