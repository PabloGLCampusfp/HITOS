CREATE DATABASE HitoProgramacion2;

USE HitoProgramacion2;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    contraseña VARCHAR(255) NOT NULL
);

CREATE TABLE tareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ID_Usuario INT NOT NULL,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    status ENUM('pendiente', 'completada') DEFAULT 'pendiente',
    Fecha_Creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (ID_Usuario) REFERENCES usuario(id) ON DELETE CASCADE
);