<?php
include 'includes/sesion.php'; // Incluye el archivo de sesión
include 'includes/DataBase.php'; // Incluye el archivo de conexión a la base de datos

verificar_logueo(); // Verifica si el usuario está logueado

$ID_Usuario = $_SESSION['user_id']; // Obtiene el ID del usuario de la sesión

// Obtener tareas del usuario
$stmt = $conn->prepare("SELECT * FROM tareas WHERE ID_Usuario = ? ORDER BY Fecha_Creacion DESC"); // Prepara una consulta SQL para seleccionar las tareas del usuario
$stmt->bind_param("i", $ID_Usuario); // Vincula el parámetro de la consulta
$stmt->execute(); // Ejecuta la consulta
$result = $stmt->get_result(); // Obtiene el resultado de la consulta
$tareas = $result->fetch_all(MYSQLI_ASSOC); // Obtiene todas las tareas como un array asociativo
$stmt->close(); // Cierra la declaración preparada
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Establece la codificación de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Establece la configuración de la ventana gráfica -->
    <title>Dashboard</title> <!-- Establece el título de la página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Incluye el archivo CSS de Bootstrap -->
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
        <h2 class="text-center">Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?></h2> <!-- Muestra el nombre del usuario -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="AgregarTareas.php" class="btn btn-success">Agregar Tarea</a> <!-- Enlace para agregar una nueva tarea -->
            <a href="cerrarSesion.php" class="btn btn-danger">Cerrar Sesion</a> <!-- Enlace para cerrar sesión -->
        </div>

        <h3>Tareas Pendientes</h3>
        <?php if (empty($tareas)): ?>
            <p>No hay tareas pendientes.</p> <!-- Muestra un mensaje si no hay tareas pendientes -->
        <?php else: ?>
            <ul class="list-group">
                <?php foreach ($tareas as $tarea): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <?php echo htmlspecialchars($tarea['titulo']); ?> <!-- Muestra el título de la tarea -->
                        <span class="badge bg-info text-dark"><?php echo htmlspecialchars($tarea['status']); ?></span> <!-- Muestra el estado de la tarea -->
                        <div>
                            <a href="marcarCompletada.php?id=<?php echo $tarea['id']; ?>" class="btn btn-sm btn-primary me-2">Completar</a> <!-- Enlace para marcar la tarea como completada -->
                            <a href="EliminarTarea.php?id=<?php echo $tarea['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estas seguro que quieres borrarla?')">Eliminar</a> <!-- Enlace para eliminar la tarea -->
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>