<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> <!-- Establecer la codificación de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Establecer la vista para dispositivos móviles -->
    <title>StreamWeb</title> <!-- Título de la página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Incluir Bootstrap CSS -->
</head>
<body>
<header class="bg-info text-white text-center py-4">
    <h1>StreamWeb</h1> <!-- Encabezado de la página -->
</header>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card border-info">
                <div class="card-header bg-info text-white text-center">
                    <h2>Nuevo Usuario</h2> <!-- Título del formulario de registro -->
                </div>
                <div class="card-body">
                    <form id="UsarFormulario" action="controlador.php" method="POST"> <!-- Formulario para registrar un nuevo usuario -->
                        <input type="hidden" name="action" value="create"> <!-- Campo oculto para indicar la acción de creación -->
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required> <!-- Campo para el nombre -->
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Correo Electrónico:</label>
                            <input type="email" name="email" id="email" class="form-control" required> <!-- Campo para el correo electrónico -->
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Edad:</label>
                                <input type="number" name="edad" id="edad" class="form-control" required> <!-- Campo para la edad -->
                            </div>
                            <div class="col">
                                <label class="form-label">Plan Base:</label>
                                <select name="plan" id="plan" class="form-select" required> <!-- Selección del plan base -->
                                    <option value="Basico">Basico</option>
                                    <option value="Estandar">Estandar</option>
                                    <option value="Premium">Premium</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Paquetes Adicionales:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="paquetes[]" value="Deporte" id="paqueteDeporte"> <!-- Opción de paquete adicional: Deporte -->
                                <label class="form-check-label" for="paqueteDeporte">Deporte</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="paquetes[]" value="Cine" id="paqueteCine"> <!-- Opción de paquete adicional: Cine -->
                                <label class="form-check-label" for="paqueteCine">Cine</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="paquetes[]" value="Infantil" id="paqueteInfantil"> <!-- Opción de paquete adicional: Infantil -->
                                <label class="form-check-label" for="paqueteInfantil">Infantil</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Duración:</label>
                            <select name="duracion" id="duracion" class="form-select" required> <!-- Selección de la duración -->
                                <option value="Mensual">Mensual</option>
                                <option value="Anual">Anual</option>
                            </select>
                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn btn-info ">Registrar</button> <!-- Botón para registrar -->
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="mb-4 text-center">Usuarios Registrados</h2> <!-- Título de la tabla de usuarios registrados -->
            <table class="table table-bordered table-hover">
                <thead class="table-info">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Edad</th>
                        <th>Plan</th>
                        <th>Paquetes</th>
                        <th>Duración</th>
                        <th>Coste Mensual</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php require_once 'mostrarUsuarios.php'; ?> <!-- Incluir el archivo para mostrar los usuarios registrados -->
                </tbody>    
            </table>
        </div>
    </div>
</div>
<script src="java.js"></script> <!-- Incluir archivo de validaciones -->
</body>
</html>

