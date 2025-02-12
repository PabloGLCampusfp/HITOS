<?php
$host = "localhost";
$dbname = "HitoProgramacion2";
$username = "root";
$password = "curso";

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}