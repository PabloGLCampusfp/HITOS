<?php
include 'includes/sesion.php'; // Incluye el archivo de sesión
// Destruir todas las variables de sesión
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye todas las variables de sesión

// Redirigir al usuario a la página de inicio
redirigir('index.php'); // Redirige al usuario a la página de inicio
