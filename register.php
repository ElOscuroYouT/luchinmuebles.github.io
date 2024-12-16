<?php
include 'db.php'; // Incluir conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono']; // Se agrega el teléfono
    $direccion = $_POST['direccion']; // Se agrega la dirección
    $password = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Asegúrate de usar password_hash para las contraseñas

    // Consulta SQL para insertar el usuario
    $sql_insert = "INSERT INTO usuarios (nombre, email, telefono, direccion, password) VALUES (?, ?, ?, ?, ?)";
    
    // Preparar la consulta
    if ($stmt_insert = $con->prepare($sql_insert)) {
        // Vincular los parámetros
        $stmt_insert->bind_param("sssss", $nombre, $email, $telefono, $direccion, $password);

        // Ejecutar la consulta
        if ($stmt_insert->execute()) {
            // Redirigir a login_register.php después de un registro exitoso
            header("Location: login_register.php");
            exit(); // Asegúrate de salir para evitar que se ejecute el código siguiente
        } else {
            echo "Error al registrar: " . $stmt_insert->error; // Mostrar error específico
        }
        $stmt_insert->close();
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
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f7f9fb;
            color: #2c3e50;
        }

        .form-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 500px;
            margin: 50px auto;
        }

        .form-container h2 {
            color: #2c3e50;
            margin-bottom: 30px;
            text-align: center;
        }

        .btn-custom {
            background-color: #3498db;
            color: white;
        }

        .btn-custom:hover {
            background-color: #2980b9;
        }

        .form-text {
            color: #7f8c8d;
        }

        .form-control {
            border-color: #ced4da;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2>Registro de Usuario</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre completo" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su correo electrónico" required>
                <div class="form-text">Nunca compartiremos tu correo con nadie más.</div>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese su teléfono" required>
            </div>
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese su dirección" required>
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña" required>
            </div>
            <button type="submit" name="register" class="btn btn-custom btn-block">Registrarse</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
