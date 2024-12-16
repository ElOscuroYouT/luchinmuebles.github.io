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
    <title>Inicio | LUCHIN</title>
    <link rel="icon" href="Imagenes/logomuebles2.png">
    <link rel="stylesheet" href="estilos.css">
</head>
<style>
/* Estilo del cuadro emergente */
/* Estilo del cuadro emergente */
.popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 80%;
    max-width: 400px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    z-index: 1000;
    text-align: center;
    padding: 20px 30px;
    display: none; /* Oculto por defecto */
    font-family: Arial, sans-serif;
    color: #333;
}
.popup h2 {
    font-size: 1.8em;
    margin-bottom: 10px;
    color: #2c3e50;
    font-weight: bold;
}
.popup p {
    font-size: 1em;
    margin-bottom: 20px;
    color: #555;
    line-height: 1.5;
}
.popup .close-btn {
    background-color: #007BFF;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s ease;
}
.popup .close-btn:hover {
    background-color: #0056b3;
}
/* Fondo oscuro */
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
    display: none; /* Oculto por defecto */
}

</style>
<body>
    <div class="overlay" id="popup-overlay"></div>
    <div class="popup" id="popup">
        <h2>¡Transforma tu hogar!</h2>
        <p>Descubre nuestra colección de muebles de alta calidad diseñados para combinar estilo, confort y durabilidad.  
        ¡Haz de tu espacio un lugar único!</p>
        <button class="close-btn" id="close-popup">Cerrar</button>
    </div>


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
                    window.location.href = 'cart.php'; // Cambia a la URL de tu página del carrito
                });
            </script>
        </div>
    </header>
    
    <!-- Banner principal -->
    <section class="main-banner">
        <div class="banner-content">
            <h2>Los mejores Dormitorios</h2>
            <p>Para la comodidad de tu hogar</p>
            <a href="tienda/tienda.html" class="cta-button">Ir a la tienda</a>
        </div>
        <div class="banner-image">
            <img src="Imagenes/tipos-de-muebles-1200x675.jpg" alt="Dormitorio">
        </div>
    </section>
    
    <div class="slider">
        <ul>
            <li><img src="Imagenes/1.jpg" alt="Imagen 1"></li>
            <li><img src="Imagenes/2.jpg" alt="Imagen 2"></li>
            <li><img src="Imagenes/4.jpg" alt="Imagen 3"></li>
            <li><img src="Imagenes/5.jpg" alt="Imagen 4"></li>
        </ul>
        <div class="controls">
            <button class="prev">❮</button>
            <button class="next">❯</button>
        </div>
    </div>
    
    <div class="image-gallery">
        <div class="gallery-item">
            <a href="../tienda_muebles/tienda/tienda.php"><img src="Imagenes/mesasala.jpg" alt="Producto 1"></a>
            <p>MESAS PARA COCINA</p>
        </div>
        <div class="gallery-item">
            <a href="../tienda_muebles/tienda/tienda.php"><img src="Imagenes/alfombra.jpeg" alt="Producto 2"></a>
            <p>ALFOMBRAS</p>
        </div>
        <div class="gallery-item">
            <a href="../tienda_muebles/tienda/tienda.php"><img src="Imagenes/Dormitorios.jpg" alt="Producto 3"></a>
            <p>DORMITORIOS</p>
        </div>
        <div class="gallery-item">
            <a href="../tienda_muebles/tienda/tienda.php"><img src="Imagenes/sala.jpg" alt="Producto 4"></a>
            <p>SALA</p>
        </div>
    </div>
    
    <!-- Sección "Sobre Nosotros" -->
    <section class="about-us">
        <div class="about-container">
            <div class="about-item">
                <img src="Imagenes/fabrica.png" alt="Icono Fábrica">
                <h3>NUESTRA FÁBRICA</h3>
                <p>Contamos con varias líneas de producción y maquinaria italiana con tecnología de punta, lo que nos permite ofrecer una gran variedad de productos con finos acabados.</p>
            </div>
            <div class="about-item">
                <img src="Imagenes/servicio-de-calidad.png" alt="Icono Calidad">
                <h3>CALIDAD Y GARANTÍA</h3>
                <p>Todos nuestros productos pasan por un riguroso control de calidad, trabajamos con los mejores materiales del mercado nacional e internacional.</p>
            </div>
            <div class="about-item">
                <img src="Imagenes/agente-de-servicio-al-cliente.png" alt="Icono Atención al Cliente">
                <h3>ATENCIÓN AL CLIENTE</h3>
                <p>Brindamos atención personalizada e información detallada sobre todos nuestros productos para garantizar tu satisfacción.</p>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Muebles LUCHIN. Todos los derechos reservados.</p>
    </footer>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const popup = document.getElementById('popup');
            const overlay = document.getElementById('popup-overlay');
            const closeBtn = document.getElementById('close-popup');
            
            // Mostrar el cuadro emergente y el fondo oscuro al cargar la página
            popup.style.display = 'block';
            overlay.style.display = 'block';
            
            // Cerrar el cuadro emergente al hacer clic en el botón "Cerrar"
            closeBtn.addEventListener('click', function() {
                popup.style.display = 'none';
                overlay.style.display = 'none';
            });

            // Cerrar el cuadro emergente si se hace clic en el fondo oscuro
            overlay.addEventListener('click', function() {
                popup.style.display = 'none';
                overlay.style.display = 'none';
            });
        });

    </script>
</body>
</html>
