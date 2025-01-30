<?php
class Conexion {
    private $servidor = "localhost";
    private $usuario = "root";
    private $password = "curso";
    private $base_de_datos = "BaseDeDatosHitoProgramacion";
    public $conexion;
    public function __construct(){
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_de_datos);
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }
}
