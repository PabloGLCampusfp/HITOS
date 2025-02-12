<?php include 'includes/sesion.php'; // Incluye el archivo de sesión ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Establece la codificación de caracteres -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Establece la configuración de la ventana gráfica -->
    <title>Administrador De Tareas</title> <!-- Establece el título de la página -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Incluye el archivo CSS de Bootstrap -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Administrador De Tareas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php if (!logeado()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="registrar.php">Regístrate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Inicia Sesión</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cerrarSesion.php">Cerrar Sesión</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center">Bienvenido al Gestor de Tareas</h1>
        <?php if (!logeado()): ?>
            <div class="text-center">
                <a href="registrar.php" class="btn btn-primary me-2">Regístrate</a>
                <a href="login.php" class="btn btn-secondary">Inicia Sesión</a>
            </div>
        <?php else: ?>
            <p class="text-center"><a href="dashboard.php" class="btn btn-success">Ir al Dashboard</a></p>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>