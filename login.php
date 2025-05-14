<?php 
include 'includes/config.php';
include 'includes/contador-visitas.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión - Fotografia 4K</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/modo-oscuro.css" id="modoOscuro">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="container mt-4">
        <h1 class="text-center">Iniciar sesión</h1>
        <form action="procesar_login.php" method="POST" class="row g-3 needs-validation" novalidate>
            <div class="col-md-6">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="col-md-6">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <div class="col-12 text-center">
                <button class="btn btn-primary" type="submit">Iniciar sesión</button>
            </div>
        </form>
        <p class="text-center mt-3">¿No tienes cuenta? <a href="registro.php">Regístrate</a></p>
    </main>

    <?php include 'includes/footer.php'; ?>
    <script src="assets/js/validacion.js"></script>
    <script src="assets/js/modo-oscuro.js"></script>
</body>
</html>