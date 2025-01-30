DROP DATABASE IF EXISTS BaseDeDatosHitoProgramacion;
CREATE DATABASE BaseDeDatosHitoProgramacion;
USE BaseDeDatosHitoProgramacion;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    edad INT NOT NULL,
    plan ENUM('Basico', 'Estandar', 'Premium') NOT NULL,
    paquetes JSON,
    duracion ENUM('Mensual', 'Anual') NOT NULL
);
