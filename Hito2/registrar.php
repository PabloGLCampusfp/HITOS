<?php
include 'includes/sesion.php'; // Incluye el archivo de sesión
include 'includes/DataBase.php'; // Incluye el archivo de conexión a la base de datos

if (logeado()) { // Verifica si el usuario está logeado
    redirigir('dashboard.php'); // Redirige al usuario al dashboard
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Verifica si el método de la solicitud es POST
    $nombre = $_POST['nombre']; // Obtiene el nombre del formulario
    $email = $_POST['email']; // Obtiene el email del formulario
    $contraseña = $_POST['contraseña']; // Obtiene la contraseña del formulario

    // Validar si el correo ya está registrado
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = ?"); // Prepara una consulta SQL para seleccionar el usuario por email
    $stmt->bind_param("s", $email); // Vincula el parámetro de la consulta
    $stmt->execute(); // Ejecuta la consulta
    $result = $stmt->get_result(); // Obtiene el resultado de la consulta

    if ($result->num_rows > 0) { // Verifica si se encontraron filas
        $error = "El correo electrónico ya está registrado."; // Establece un mensaje de error
    } else {
        // Hash de la contraseña
        $contraseña_hashed = password_hash($contraseña, PASSWORD_BCRYPT); // Hashea la contraseña

        // Insertar usuario
        $stmt = $conn->prepare("INSERT INTO usuario (nombre, email, contraseña) VALUES (?, ?, ?)"); // Prepara una consulta SQL para insertar el usuario
        $stmt->bind_param("sss", $nombre, $email, $contraseña_hashed); // Vincula los parámetros de la consulta

        if ($stmt->execute()) { // Ejecuta la consulta y verifica si fue exitosa
            $success = "Has conseguido registrarte ahora inicia sesion"; // Establece un mensaje de éxito
        } else {
            $error = "Error al registrar el usuario."; // Establece un mensaje de error
        }
    }

    $stmt->close(); // Cierra la declaración preparada
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Regístrate</h2>
        <?php if (isset($success)): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de Usuario:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        <p class="mt-3 text-center">¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión</a>.</p>
    </div>
</body>
</html>
