<?php
include 'includes/sesion.php'; // Incluye el archivo de sesión
include 'includes/DataBase.php'; // Incluye el archivo de conexión a la base de datos

if (logeado()) { // Verifica si el usuario está logeado
    redirigir('dashboard.php'); // Redirige al usuario al dashboard
}

$error = ""; // Inicializa la variable de error

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Verifica si el método de la solicitud es POST
    $email = $_POST['email']; // Obtiene el email del formulario
    $contraseña = $_POST['contraseña']; // Obtiene la contraseña del formulario

    // Buscar usuario por correo
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE email = ?"); // Prepara una consulta SQL para seleccionar el usuario por email
    $stmt->bind_param("s", $email); // Vincula el parámetro de la consulta
    $stmt->execute(); // Ejecuta la consulta
    $result = $stmt->get_result(); // Obtiene el resultado de la consulta

    if ($result->num_rows > 0) { // Verifica si se encontraron filas
        $user = $result->fetch_assoc(); // Obtiene los datos del usuario

        // Verificar contraseña
        if (password_verify($contraseña, $user['contraseña'])) { // Verifica si la contraseña es correcta
            $_SESSION['user_id'] = $user['id']; // Establece el ID del usuario en la sesión
            $_SESSION['nombre'] = $user['nombre']; // Establece el nombre del usuario en la sesión
            redirigir('dashboard.php'); // Redirige al usuario al dashboard
        } else {
            $error = "Contraseña incorrecta."; // Establece un mensaje de error
        }
    } else {
        $error = "Usuario no encontrado."; // Establece un mensaje de error
    }

    $stmt->close(); // Cierra la declaración preparada
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Iniciar Sesión</h2>
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="contraseña" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" required>
            </div>
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        <p class="mt-3 text-center">¿No tienes cuenta? <a href="registrar.php">Regístrate</a>.</p>
    </div>
</body>
</html>