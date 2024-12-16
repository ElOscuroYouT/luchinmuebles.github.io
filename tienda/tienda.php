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
    <title>Tienda | LUCHIN</title>
    <link rel="icon" href="../Imagenes/logomuebles2.png">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }

        /* Header */
        .header {
            background-color: #2c3e50;
            padding: 10px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra sutil */
        }

        .header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 50px;
        }

        .header .logo {
            display: flex;
            align-items: center; /* Centra verticalmente la imagen y el texto */
        }

        .header .logo img {
            height: 60px; /* Ajusta la altura de la imagen */
            width: auto;
            margin-right: 15px; /* Espacio entre la imagen y el texto */
            transition: transform 0.3s ease; /* Animación para la imagen */
        }

        .header .logo img:hover {
            transform: scale(1.1); /* Efecto de aumento al pasar el mouse */
        }

        .header .logo h1 {
            margin: 0;
            font-size: 28px;
            color: #ecf0f1;
            font-weight: bold;
        }

        .header .logo p {
            margin: 0;
            font-size: 14px;
            color: #bdc3c7;
        }

        /* Navegación */
        .header .navigation ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .header .navigation ul li {
            margin: 0 15px;
        }

        .header .navigation ul li a {
            text-decoration: none;
            color: #ecf0f1;
            font-size: 16px;
            padding: 10px;
            transition: color 0.3s, background-color 0.3s;
        }

        .header .navigation ul li a:hover {
            color: #1abc9c;
            background-color: #34495e;
            border-radius: 5px;
        }

        /* Opciones de usuario */
        .header .user-options button {
            background-color: #1abc9c;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-left: 10px;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .header .user-options button:hover {
            background-color: #16a085;
        }

        /* Ajustes responsivos */
        @media (max-width: 768px) {
            .header .container {
                flex-direction: column;
            }

            .header .navigation ul {
                flex-direction: column;
                align-items: center;
            }

            .header .user-options {
                margin-top: 10px;
            }
        }

        /* Menú de categorías */
        /* Category Menu */
.category-menu {
    background-color: #2c3e50;
    padding: 10px 0;
    position: sticky; /* Mantiene el menú visible al hacer scroll */
    top: 0; /* Se pega a la parte superior de la ventana */
    z-index: 999; /* Asegura que esté por encima de otros elementos */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para resaltar */
}

.category-menu ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
}

.category-menu ul li {
    margin: 0 15px;
}

.category-menu ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 14px;
    padding: 8px;
    transition: background-color 0.3s;
}

.category-menu ul li a:hover {
    background-color: #1abc9c;
    border-radius: 5px;
}


        /* Contenedor de contenido */
        #content-area {
            padding: 20px;
            text-align: center;
        }

        /* Footer */
        footer {
            background-color: #34495e;
            padding: 20px 0;
            text-align: center;
            color: #fff;
            font-size: 14px;
        }

        footer p {
            margin: 0;
        }
        .image-gallery {
    display: flex;
    justify-content: center;
    margin: 40px 0;
}

.gallery-item {
    text-align: center;
    margin: 0 10px;
}

.gallery-item a {
    display: block;
    overflow: hidden;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    transition: transform 0.3s, box-shadow 0.3s;
    width: 300px;
    height: 300px;
}

.gallery-item a:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
}

.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.gallery-item p {
    margin-top: 10px;
    font-size: 14px;
    color: #34495e;
}

    </style>
</head>
<body>
    <!-- Header con logo y navegación -->
    <header class="header">
        <div class="container">
            <div class="logo">
                <a href="index.html" style="text-decoration: none; color: inherit;">
                    <img src="../Imagenes/logomuebles2.png" alt="Logo LUCHIN">
                    <h1>LUCHIN</h1>
                    <p>De todo para su casa</p>
                </a>
            </div>            
            <nav class="navigation">
                <ul>
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="../tienda/tienda.php">Tienda</a></li>
                    <li><a href="../nosotros.php">Nosotros</a></li>
                    <li><a href="../proyectos.php">Proyectos</a></li>
                    <li><a href="../contacto.php">Contacto</a></li>
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
                <button id="cart-btn" onclick="location.href='../cart.php'">Carrito 🛒</button>
            </div>
            <script>
                document.getElementById('login-register-btn').addEventListener('click', function() {
                    window.location.href = '../login_register.php'; // Correcto si el archivo está en la carpeta anterior
                });
                // Redirige al usuario a la página del carrito
                document.getElementById('cart-btn').addEventListener('click', function() {
                    window.location.href = 'cart.html'; // Cambia a la URL de tu página del carrito
                });
            </script>
        </div>
    </header>
    
    <!-- Menú de categorías -->
    <nav class="category-menu">
        <ul>
            <li><a href="#" onclick="loadContent('salas.php')">Salas</a></li>
            <li><a href="#" onclick="loadContent('comedores.php')">Comedores</a></li>
            <li><a href="#" onclick="loadContent('dormitorios.php')">Dormitorios</a></li>
            <li><a href="#" onclick="loadContent('decoraciones.php')">Decoración</a></li>
            <li><a href="#" onclick="loadContent('alfombras.php')">Alfombras</a></li>
        </ul>
    </nav>

    <!-- Contenedor para mostrar el contenido -->
    <div id="content-area">
        <h2>Bienvenido a la Tienda LUCHIN</h2>
        <p>Selecciona una categoría para ver los productos.</p>
    </div>
    <div class="image-gallery">
        <div class="gallery-item">
            <a href="#" onclick="loadContent('comedores.php')"><img src="../Imagenes/mesasala.jpg" alt="Producto 1"></a>
            <p>MESAS PARA COCINA</p>
        </div>
        <div class="gallery-item">
            <a href="#" onclick="loadContent('alfombras.php')"><img src="../Imagenes/alfombra.jpeg" alt="Producto 2"></a>
            <p>ALFOMBRAS</p>
        </div>
        <div class="gallery-item">
            <a href="#" onclick="loadContent('dormitorios.php')"><img src="../Imagenes/Dormitorios.jpg" alt="Producto 3"></a>
            <p>DORMITORIOS</p>
        </div>
        <div class="gallery-item">
            <a href="#" onclick="loadContent('salas.php')"><img src="../Imagenes/sala.jpg" alt="Producto 4"></a>
            <p>SALA</p>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Muebles LUCHIN. Todos los derechos reservados.</p>
    </footer>

    <script>
        function loadContent(page) {
            const contentArea = document.getElementById('content-area');
            const xhr = new XMLHttpRequest();
            xhr.open('GET', page, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    contentArea.innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
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