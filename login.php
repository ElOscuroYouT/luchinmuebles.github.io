<?php
include 'db.php'; // Incluir conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verificar si el usuario existe en la base de datos
    $query = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Verificar la contraseña utilizando password_verify
        if (password_verify($password, $usuario['password'])) { // Cambié 'contraseña' a 'password'
            // Iniciar sesión
            session_start();
            $_SESSION['id_usuario'] = $usuario['id']; // Cambia 'id' si es necesario
            $_SESSION['nombre'] = $usuario['nombre_completo']; // Ajusta el campo según tu base de datos
            header("Location: index.html"); // Redirigir a la página principal
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "El usuario no existe.";
    }
    $stmt->close();
}
?>
