<?php
include 'includes/sesion.php'; // Incluye el archivo de sesión
include 'includes/DataBase.php'; // Incluye el archivo de conexión a la base de datos

verificar_logueo(); // Verifica si el usuario está logueado

// Verificar si se proporcionó un ID de tarea
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) { // Verifica si el ID de la tarea no está establecido o no es numérico
    redirigir('dashboard.php'); // Redirige al usuario al dashboard
}

$tarea_id = $_GET['id']; // Obtiene el ID de la tarea de la URL
$ID_Usuario = $_SESSION['user_id']; // Obtiene el ID del usuario de la sesión

// Verificar si la tarea pertenece al usuario actual
$stmt = $conn->prepare("SELECT * FROM tareas WHERE id = ? AND ID_Usuario = ?"); // Prepara una consulta SQL para seleccionar la tarea
$stmt->bind_param("ii", $tarea_id, $ID_Usuario); // Vincula los parámetros de la consulta
$stmt->execute(); // Ejecuta la consulta
$result = $stmt->get_result(); // Obtiene el resultado de la consulta

if ($result->num_rows == 0) { // Verifica si no se encontraron filas
    // La tarea no existe o no pertenece al usuario
    redirigir('dashboard.php'); // Redirige al usuario al dashboard
}

// Actualizar el estado de la tarea a "completada"
$stmt = $conn->prepare("UPDATE tareas SET status = 'completada' WHERE id = ?"); // Prepara una consulta SQL para actualizar el estado de la tarea
$stmt->bind_param("i", $tarea_id); // Vincula el parámetro de la consulta

if ($stmt->execute()) { // Ejecuta la consulta y verifica si fue exitosa
    // Redirigir al dashboard después de actualizar
    redirigir('dashboard.php'); // Redirige al usuario al dashboard
} else {
    // Mostrar un mensaje de error si algo falla
    echo "Error al marcar la tarea como completada."; // Muestra un mensaje de error
}

$stmt->close(); // Cierra la declaración preparada
