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
    <title>Contacto | LUCHIN</title>
    <link rel="icon" href="Imagenes/logomuebles2.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
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
    <div class="contact-container">
        <h2>¿Necesitas Ayuda?</h2>
        <h2>CONTÁCTANOS</h2>
    </div>

    <div class="contact-wrapper">
        <div class="contact-info">
            <h3><i class="fas fa-map-marker-alt"></i> DIRECCIÓN</h3>
            <p>Jr 25 de abril 255</p>

            <h3><i class="fas fa-store"></i> TIENDA</h3>
            <p>959568159</p>

            <h3><i class="fas fa-headset"></i> ATENCIÓN POST VENTA</h3>
            <p>998154744</p>

            <h3><i class="fas fa-envelope"></i> CORREO ELECTRÓNICO</h3>
            <p>tiendaluchin@gmail.com</p>
        </div>

        <div class="form-container">
            <form action="enviar_contacto.php" method="POST" class="contact-form">
                <label for="nombre">Nombre Completo(*)</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="correo">Correo Electrónico (*)</label>
                <input type="email" id="correo" name="correo" required>

                <label for="asunto">Asunto (*)</label>
                <input type="text" id="asunto" name="asunto" required>

                <label for="mensaje">Mensaje (*)</label>
                <textarea id="mensaje" name="mensaje" rows="5" required></textarea>

                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
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