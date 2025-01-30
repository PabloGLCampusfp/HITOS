<?php
require_once 'conexion.php'; // Incluir el archivo de conexión a la base de datos
$conexion = new Conexion(); // Crear una nueva instancia de la clase Conexion
$id = $_GET['id']; // Obtener el ID del usuario a editar desde la URL
$sql = "SELECT * FROM usuarios WHERE id=$id"; // Preparar la consulta SQL para obtener los datos del usuario
$result = $conexion->conexion->query($sql); // Ejecutar la consulta
$fila = $result->fetch_assoc(); // Obtener los datos del usuario
$conexion->conexion->close(); // Cerrar la conexión a la base de datos
$paquetes = json_decode($fila['paquetes'], true); // Decodificar los paquetes del usuario desde JSON
?>
<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Incluir Bootstrap CSS -->
</head>
<body>
<div class="container mt-5">
    <div class="card border-info">
        <div class="card-header bg-info text-white">
            <h2>Editar Usuario</h2>
        </div>
        <div class="card-body">
            <form id="UsarFormulario" action="controlador.php" method="POST"> <!-- Formulario para actualizar el usuario -->
                <input type="hidden" name="action" value="update"> <!-- Campo oculto para indicar la acción de actualización -->
                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>"> <!-- Campo oculto para el ID del usuario -->
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Nombre:</label>
                        <input type="text" name="nombre" id="editNombre" class="form-control" value="<?php echo $fila['nombre']; ?>" required> <!-- Campo para el nombre -->
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Correo Electrónico:</label>
                    <input type="email" name="email" id="editEmail" class="form-control" value="<?php echo $fila['email']; ?>" required> <!-- Campo para el correo electrónico -->
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label">Edad:</label>
                        <input type="number" name="edad" id="editEdad" class="form-control" value="<?php echo $fila['edad']; ?>" required> <!-- Campo para la edad -->
                    </div>
                    <div class="col">
                        <label class="form-label">Plan Base:</label>
                        <select name="plan" id="editPlan" class="form-select" required> <!-- Campo para seleccionar el plan -->
                            <option value="Basico" <?php if ($fila['plan'] == 'Basico') echo 'selected'; ?>>Basico</option>
                            <option value="Estandar" <?php if ($fila['plan'] == 'Estandar') echo 'selected'; ?>>Estandar</option>
                            <option value="Premium" <?php if ($fila['plan'] == 'Premium') echo 'selected'; ?>>Premium</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Paquetes Adicionales:</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="paquetes[]" value="Deporte" id="paqueteDeporte" <?php if (in_array('Deporte', $paquetes)) echo 'checked'; ?>> <!-- Checkbox para el paquete Deporte -->
                        <label class="form-check-label" for="paqueteDeporte">Deporte</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="paquetes[]" value="Cine" id="paqueteCine" <?php if (in_array('Cine', $paquetes)) echo 'checked'; ?>> <!-- Checkbox para el paquete Cine -->
                        <label class="form-check-label" for="paqueteCine">Cine</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="paquetes[]" value="Infantil" id="paqueteInfantil" <?php if (in_array('Infantil', $paquetes)) echo 'checked'; ?>> <!-- Checkbox para el paquete Infantil -->
                        <label class="form-check-label" for="paqueteInfantil">Infantil</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Duración:</label>
                    <select name="duracion" id="editDuracion" class="form-select" required> <!-- Campo para seleccionar la duración -->
                        <option value="Mensual" <?php if ($fila['duracion'] == 'Mensual') echo 'selected'; ?>>Mensual</option>
                        <option value="Anual" <?php if ($fila['duracion'] == 'Anual') echo 'selected'; ?>>Anual</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-info">Actualizar</button> <!-- Botón para actualizar el usuario -->
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> <!-- Incluir Bootstrap JS -->
<script src="java.js"></script> <!-- Incluir archivo de validaciones -->
</body>
</html>