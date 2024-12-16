<?php
include 'db.php'; // Incluir conexión a la base de datos

// Manejo del inicio de sesión
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el usuario existe en la base de datos
    $query = "SELECT * FROM usuarios WHERE email = ?";
    
    // Preparar la consulta
    if ($stmt = $con->prepare($query)) {
        // Vincular parámetros
        $stmt->bind_param("s", $email);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Obtener resultados
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();

            // Verificar la contraseña
            if (password_verify($password, $usuario['password'])) { // Verificar la contraseña hasheada
                // Iniciar sesión
                session_start();
                $_SESSION['id_usuario'] = $usuario['id']; // Cambia 'id' si es necesario
                $_SESSION['nombre'] = $usuario['nombre']; // Ajusta el campo según tu base de datos
                header("Location: index.php"); // Redirigir a la página principal
                exit();
            } else {
                $error_message = "Contraseña incorrecta.";
            }
        } else {
            $error_message = "El usuario no existe.";
        }
        
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $con->error; // Mostrar error específico
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión del Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9; /* Color de fondo suave */
            color: #2c3e50; /* Color oscuro para el texto */
        }

        .form-container {
            background-color: #ffffff; /* Fondo blanco para el formulario */
            border-radius: 12px; /* Bordes redondeados para suavizar el contenedor */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Sombra ligera */
            padding: 40px;
            max-width: 500px;
            margin: 50px auto;
        }

        .form-container h2 {
            color: #1abc9c; /* Verde suave para el encabezado */
            margin-bottom: 25px; /* Espacio debajo del encabezado */
            text-align: center;
            font-family: 'Arial', sans-serif; /* Fuente moderna */
            font-size: 2em; /* Tamaño grande para el encabezado */
        }

        .btn-custom {
            background-color: #3498db; /* Azul para los botones */
            color: white;
            border: none; /* Sin borde */
            border-radius: 5px; /* Bordes redondeados */
            padding: 12px 20px; /* Espaciado interno */
            font-size: 1em; /* Tamaño de fuente */
            transition: background-color 0.3s ease; /* Efecto de transición */
        }

        .btn-custom:hover {
            background-color: #2980b9; /* Azul más oscuro al pasar el ratón */
        }

        .form-text {
            color: #7f8c8d; /* Color gris para el texto informativo */
            font-size: 0.9em; /* Tamaño de fuente ajustado */
        }

        .form-control {
            border: 1px solid #bdc3c7; /* Borde gris claro para los campos */
            border-radius: 5px; /* Bordes redondeados */
            padding: 10px; /* Espaciado interno para comodidad */
        }

        .error-message {
            color: #e74c3c; /* Rojo para mensajes de error */
            text-align: center;
            font-size: 0.9em; /* Tamaño de fuente más pequeño */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Iniciar Sesión</h2>
        <?php if (isset($error_message)): ?>
            <div class="error-message"><?= $error_message; ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" required>
            </div>
            <button type="submit" name="login" class="btn btn-custom btn-block">Iniciar Sesión</button>
        </form>
        <div class="mt-3 text-center">
            <a href="register.php" class="btn btn-custom">Registrar</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
