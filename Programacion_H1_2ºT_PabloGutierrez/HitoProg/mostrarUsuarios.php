<?php
require_once 'conexion.php'; // Incluir el archivo de conexión a la base de datos
$conexion = new Conexion(); // Crear una nueva instancia de la clase Conexion
$sql = "SELECT * FROM usuarios"; // Preparar la consulta SQL para obtener todos los usuarios
$resultado = $conexion->conexion->query($sql); // Ejecutar la consulta

$CosteDeLosPlanes = ["Basico" => 10, "Estandar" => 20, "Premium" => 30]; // Definir los precios de los planes
$CosteDeLosPaquetes = ["Deporte" => 5, "Cine" => 7, "Infantil" => 4]; // Definir los precios de los paquetes

if ($resultado->num_rows > 0) { // Verificar si hay usuarios registrados
    while ($Fila = $resultado->fetch_assoc()) { // Recorrer los resultados de la consulta
        $coste_mensual = $CosteDeLosPlanes[$Fila['plan']]; // Obtener el precio del plan del usuario
        $paquetes = json_decode($Fila['paquetes'], true); // Decodificar los paquetes del usuario desde JSON
        foreach ($paquetes as $paquete) { // Recorrer los paquetes del usuario
            if (isset($CosteDeLosPaquetes[$paquete])) { // Verificar si el paquete tiene un precio definido
                $coste_mensual += $CosteDeLosPaquetes[$paquete]; // Sumar el precio del paquete al coste mensual
            }
        }

        // Mostrar los datos del usuario en una fila de la tabla
        echo "<tr>";
        echo "<td>{$Fila['nombre']}</td>";
        echo "<td>{$Fila['email']}</td>";
        echo "<td>{$Fila['edad']}</td>";
        echo "<td>{$Fila['plan']}</td>";
        echo "<td>" . implode(", ", $paquetes) . "</td>";
        echo "<td>{$Fila['duracion']}</td>";
        echo "<td>\$" . number_format($coste_mensual, 2) . "</td>";
        echo "<td>
                <form method='POST' action='controlador.php'>
                    <input type='hidden' name='action' value='delete'>
                    <input type='hidden' name='id' value='{$Fila['id']}'>
                    <button type='submit' class='btn btn-danger btn-sm'>Eliminar</button>
                </form>
                <form method='GET' action='editarUsuario.php'>
                    <input type='hidden' name='id' value='{$Fila['id']}'>
                    <button type='submit' class='btn btn-primary btn-sm'>Editar</button>
                </form>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>No hay usuarios registrados.</td></tr>"; // Mostrar mensaje si no hay usuarios registrados
}
$conexion->conexion->close(); // Cerrar la conexión a la base de datos

