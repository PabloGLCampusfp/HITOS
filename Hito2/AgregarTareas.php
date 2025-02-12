<?php
include 'includes/sesion.php'; // Incluye el archivo de sesión
include 'includes/DataBase.php'; // Incluye el archivo de conexión a la base de datos

verificar_logueo(); // Verifica si el usuario está logueado

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Verifica si el método de la solicitud es POST
    $ID_Usuario = $_SESSION['user_id']; // Obtiene el ID del usuario de la sesión
    $titulo = $_POST['titulo']; // Obtiene el título del formulario
    $descripcion = $_POST['descripcion']; // Obtiene la descripción del formulario

    $stmt = $conn->prepare("INSERT INTO tareas (ID_Usuario, titulo, descripcion, Fecha_Creacion) VALUES (?, ?, ?, NOW())"); // Prepara una consulta SQL para insertar la tarea
    $stmt->bind_param("iss", $ID_Usuario, $titulo, $descripcion); // Vincula los parámetros de la consulta

    if ($stmt->execute()) { // Ejecuta la consulta y verifica si fue exitosa
        redirigir('dashboard.php'); // Redirige al usuario al dashboard
    } else {
        $error = "Error al agregar la tarea."; // Establece un mensaje de error
    }

    $stmt->close(); // Cierra la declaración preparada
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Administrador De Tareas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cerrarSesion.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Agregar Tarea</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        <a href="dashboard.php" class="btn btn-secondary mt-3">Volver al Dashboard</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>