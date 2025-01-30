<?php
require_once 'conexion.php'; // Incluir el archivo de conexión a la base de datos
$conexion = new Conexion(); // Crear una nueva instancia de la clase Conexion

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Verificar si la solicitud es de tipo POST
    $action = $_POST['action']; // Obtener la acción a realizar (create, update, delete)
    
    if ($action === 'create') { // Si la acción es crear un nuevo usuario
        $nombre = $_POST['nombre']; // Obtener el nombre del formulario
        $email = $_POST['email']; // Obtener el email del formulario
        $edad = $_POST['edad']; // Obtener la edad del formulario
        $plan = $_POST['plan']; // Obtener el plan del formulario
        $paquetes = isset($_POST['paquetes']) ? json_encode($_POST['paquetes']) : json_encode([]); // Obtener los paquetes seleccionados y convertirlos a JSON
        $duracion = $_POST['duracion']; // Obtener la duración del formulario
        
        // Preparar la consulta SQL para insertar un nuevo usuario
        $SQL = $conexion->conexion->prepare("INSERT INTO usuarios (nombre, email, edad, plan, paquetes, duracion) VALUES (?, ?, ?, ?, ?, ?)");
        $SQL->bind_param("ssisss", $nombre, $email, $edad, $plan, $paquetes, $duracion); // Vincular los parámetros
        $SQL->execute(); // Ejecutar la consulta
        $SQL->close(); // Cerrar la consulta
        header('Location: index.php'); // Redirigir a la página principal
    } elseif ($action === 'update') { // Si la acción es actualizar un usuario existente
        $id = $_POST['id']; // Obtener el ID del usuario a actualizar
        $nombre = $_POST['nombre']; // Obtener el nombre del formulario
        $email = $_POST['email']; // Obtener el email del formulario
        $edad = $_POST['edad']; // Obtener la edad del formulario
        $plan = $_POST['plan']; // Obtener el plan del formulario
        $paquetes = isset($_POST['paquetes']) ? json_encode($_POST['paquetes']) : json_encode([]); // Obtener los paquetes seleccionados y convertirlos a JSON
        $duracion = $_POST['duracion']; // Obtener la duración del formulario
        
        // Preparar la consulta SQL para actualizar un usuario existente
        $SQL = $conexion->conexion->prepare("UPDATE usuarios SET nombre=?, email=?, edad=?, plan=?, paquetes=?, duracion=? WHERE id=?");
        $SQL->bind_param("ssisssi", $nombre, $email, $edad, $plan, $paquetes, $duracion, $id); // Vincular los parámetros
        $SQL->execute(); // Ejecutar la consulta
        $SQL->close(); // Cerrar la consulta
        header('Location: index.php'); // Redirigir a la página principal
    } elseif ($action === 'delete') { // Si la acción es eliminar un usuario
        $id = $_POST['id']; // Obtener el ID del usuario a eliminar
        
        // Preparar la consulta SQL para eliminar un usuario
        $SQL = $conexion->conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $SQL->bind_param("i", $id); // Vincular el parámetro
        $SQL->execute(); // Ejecutar la consulta
        header('Location: index.php'); // Redirigir a la página principal
    }
}
$conexion->conexion->close(); // Cerrar la conexión a la base de datos